<?php

namespace Lexik\Bundle\TranslationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Apartamentos\ApartamentosBundle\Entity\LexikTransUnitTranslations;
use Apartamentos\ApartamentosBundle\Entity\LexikTransUnit;
use Lexik\Bundle\TranslationBundle\Document\TransUnit as TransUnitDocument;
use Lexik\Bundle\TranslationBundle\Model\File;
use Lexik\Bundle\TranslationBundle\Model\TransUnit;
use Lexik\Bundle\TranslationBundle\Form\TransUnitType;
use Lexik\Bundle\TranslationBundle\Util\JQGrid\Mapper;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
/**

/**
 * Translations edition controlller.
 *
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class EditionController extends Controller
{
    /**
     * List trans unit element in json format.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $locales = $this->getManagedLocales();
        $storage = $this->get('lexik_translation.translation_storage');

        $transUnits = $storage->getTransUnitList(
            $locales,
            $this->get('request')->query->get('rows', 20),
            $this->get('request')->query->get('page', 1),
            $this->get('request')->query->all()
        );

        $count = $storage->countTransUnits($locales, $this->get('request')->query->all());

        $jqGridMapper = new Mapper($this->get('request'), $transUnits, $count);

        $response = new Response($jqGridMapper->generate($locales));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Display a javascript grid to edit trans unit elements.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function gridAction()
    {
        return $this->render('LexikTranslationBundle:Edition:grid.html.twig', array(
            'layout'    => $this->container->getParameter('lexik_translation.base_layout'),
            'inputType' => $this->container->getParameter('lexik_translation.grid_input_type'),
            'locales'   => $this->getManagedLocales(),
        ));
    }

    /**
     * Update a trans unit element from the javascript grid.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return \Symfony\Component\HttpFoundation\Response
     
    public function updateAction($id)
    {
        $request = $this->get('request');
        
        
        //if ( ! $request->isXmlHttpRequest() ) {
            //throw new NotFoundHttpException();
        //}

        //$response = new Response('', 200, array('Content-type' => 'application/json'));

        //if ('edit' == $request->request->get('oper')) {
            $storage = $this->get('lexik_translation.translation_storage');
            $em = $this->getDoctrine()->getManager();
         
             $entity = $em->getRepository('ApartamentosApartamentosBundle:LexikTransUnitTranslations')->find($id);
             $transuntid=$entity->getTransUnit()->getId();
             $transUnit = $storage->getTransUnitById($transuntid);
            //$transUnit = $storage->getTransUnitById($request->request->get('id'));

            //if (!($transUnit instanceof TransUnit)) {
                //throw new NotFoundHttpException();
            //}

            $translationsContent = array();
            foreach ($this->getManagedLocales() as $locale) {
                $translationsContent[$locale] = $request->request->get($locale);
            }

            $this->get('lexik_translation.trans_unit.manager')->updateTranslationsContent($transUnit, $translationsContent);

            //if ($transUnit instanceof TransUnitDocument) {
                //$transUnit->convertMongoTimestamp();
            //}

            $storage->flush();

            //$response->setContent(json_encode(array('message' => sprintf('TransUnit #%d updated.', $transUnit->getId()))));
       //}

        //return $response;
             return $this->redirect($this->generateUrl('lexik_translation_grid'));
    }*/

    /**
     * Remove cache files for managed locales.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function invalidateCacheAction()
    {
        $this->get('translator')->removeLocalesCacheFiles($this->getManagedLocales());

        /** @var $session Session */
        $session = $this->get('session');

        $session->getFlashBag()->set('success', $this->get('translator')->trans('translations.cache_removed', array(), 'LexikTranslationBundle'));

        return $this->redirect($this->generateUrl('lexik_translation_grid'));
    }

    /**
     * Add a new trans unit with translation for managed locales.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction()
    {
        $storage = $this->get('lexik_translation.translation_storage');
        $transUnit = $this->get('lexik_translation.trans_unit.manager')->newInstance($this->getManagedLocales());

        $options = array(
            'domains'           => $storage->getTransUnitDomains(),
            'data_class'        => $storage->getModelClass('trans_unit'),
            'translation_class' => $storage->getModelClass('translation'),
        );

        $form = $this->createForm(new TransUnitType(), $transUnit, $options);

        if ($this->get('request')->getMethod() == 'POST') {
            $form->bind($this->get('request'));

            if ($form->isValid()) {
                $translations = $transUnit->filterNotBlankTranslations(); // only keep translations with a content

                // link new translations to a file to be able to export them.
                foreach ($translations as $translation) {
                    if (!$translation->getFile()) {
                        $file = $this->get('lexik_translation.file.manager')->getFor(
                            sprintf('%s.%s.yml', $transUnit->getDomain(), $translation->getLocale()),  // @todo allow other format
                            $this->container->getParameter('kernel.root_dir').'/Resources/translations'
                        );

                        if ($file instanceof File) {
                            $translation->setFile($file);
                        }
                    }
                }

                $transUnit->setTranslations($translations);
                $storage->persist($transUnit);
                $storage->flush();

                return $this->redirect($this->generateUrl('lexik_translation_grid'));
            }
        }

        return $this->render('LexikTranslationBundle:Edition:new.html.twig', array(
            'layout' => $this->container->getParameter('lexik_translation.base_layout'),
            'form'   => $form->createView(),
        ));
    }
    
    /**
    * Creates a form to edit a Cause entity.
    *
    * @param Cause $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LexikTransUnitTranslations $entity,$id)
    {    
        $request = $this->get('request');
        $storage = $this->get('lexik_translation.translation_storage');
        
        $em = $this->getDoctrine()->getManager();
         
        $entity = $em->getRepository('ApartamentosApartamentosBundle:LexikTransUnitTranslations')->find($id);
        $transuntid=$entity->getTransUnit()->getId();
        
        $transUnit = $storage->getTransUnitById($transuntid);
       
        $options = array(
            'domains'           => $storage->getTransUnitDomains(),
            'data_class'        => $storage->getModelClass('trans_unit'),
            'translation_class' => $storage->getModelClass('translation'),
        );

        $form = $this->createForm(new TransUnitType(), $transUnit, $options);

        return $form;
    }
    /**
     * Returns managed locales.
     *
     * @return array
     */
    protected function getManagedLocales()
    {
        return $this->container->getParameter('lexik_translation.managed_locales');
    }
    
     
    public function TranslationgridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:LexikTransUnitTranslations');
         
       $tableAlias = $source->getTableAlias();
       $source->manipulateQuery(
       function ($query)       
      {
        //$query->resetDQLPart('orderBy');  
        $query->addGroupby('_transUnit.id');
      }
      );
        //$trans_unit = $source->getTransUnit('self');
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        // Add Edit actions in the default row actions column
        
         $editColumn = new ActionsColumn('info_column_1', '');
         $editColumn->setSeparator("<br />");
         $grid->addColumn($editColumn, 10);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'translation_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
         
         $userColumns = array('transUnit.keyName','transUnit.domain','locale','content');
         $grid->setColumnsOrder($userColumns);
       
         $grid->hideColumns(array('id','createdAt','updatedAt','locale'));
     
        return $grid->getGridResponse('LexikTranslationBundle:Edition:Translationgrid.html.twig',array(
            'layout'    => $this->container->getParameter('lexik_translation.base_layout'),
            'inputType' => $this->container->getParameter('lexik_translation.grid_input_type'),
            'locales'   => $this->getManagedLocales()));
    }
    
    
    public function EdittranslationAction($id)
    {
       $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:LexikTransUnitTranslations')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LexikTransUnitTranslations entity.');
        }

        $editForm = $this->createEditForm($entity,$id);
       return $this->render('LexikTranslationBundle:Edition:edit.html.twig', array(
            'layout' => $this->container->getParameter('lexik_translation.base_layout'),
            'form'   => $editForm->createView(),
        )); 
    }
    
    
    public function UpdatetranslationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $em2 =$this->getDoctrine()->getManager();
        $request = $this->get('request');
        $storage = $this->get('lexik_translation.translation_storage');
        $entity = $em->getRepository('ApartamentosApartamentosBundle:LexikTransUnitTranslations')->find($id);
        $transunit =$em2->getRepository('ApartamentosApartamentosBundle:LexikTransUnit')->find($entity->getTransUnit()->getId());   

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LexikTransUnitTranslations entity.');
        }

        $editForm = $this->createEditForm($entity,$id);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $em->persist($transunit);
            $em->flush();
            
            $this->updatetranslations($id);
            

            return $this->redirect($this->generateUrl('lexik_translation_grid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        );   
        
    }        
       
    
    public function updatetranslations($id)
    {
        $storage = $this->get('lexik_translation.translation_storage');
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ApartamentosApartamentosBundle:LexikTransUnitTranslations')->find($id);
        $transuntid=$entity->getTransUnit()->getId();
        $transUnit = $storage->getTransUnitById($transuntid);
        $translations = $transUnit->filterNotBlankTranslations();
                // link new translations to a file to be able to export them.
                foreach ($translations as $translation) {
                    if (!$translation->getFile()) {
                        $file = $this->get('lexik_translation.file.manager')->getFor(
                            sprintf('%s.%s.yml', $transUnit->getDomain(), $translation->getLocale()),  // @todo allow other format
                            $this->container->getParameter('kernel.root_dir').'/Resources/translations'
                        );

                        if ($file instanceof File) {
                            $translation->setFile($file);
                        }
                    }
                }

                $transUnit->setTranslations($translations);
                $storage->persist($transUnit);
                $storage->flush();   
    }
    
}
