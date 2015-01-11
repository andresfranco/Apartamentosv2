<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/css/optimized-jqgrid')) {
            // _assetic_438b731
            if ($pathinfo === '/css/optimized-jqgrid.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '438b731',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_438b731',);
            }

            // _assetic_438b731_0
            if ($pathinfo === '/css/optimized-jqgrid_ui.jqgrid_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '438b731',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_438b731_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js/optimized-translator-1')) {
            // _assetic_41693b9
            if ($pathinfo === '/js/optimized-translator-1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '41693b9',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_41693b9',);
            }

            if (0 === strpos($pathinfo, '/js/optimized-translator-1_')) {
                // _assetic_41693b9_0
                if ($pathinfo === '/js/optimized-translator-1_grid.locale-en_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '41693b9',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_41693b9_0',);
                }

                // _assetic_41693b9_1
                if ($pathinfo === '/js/optimized-translator-1_jquery.jqGrid.min_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '41693b9',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_41693b9_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/a')) {
                if (0 === strpos($pathinfo, '/admin/account')) {
                    // account
                    if (rtrim($pathinfo, '/') === '/admin/account') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_account;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'account');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::indexAction',  '_route' => 'account',);
                    }
                    not_account:

                    // account_create
                    if (preg_match('#^/admin/account/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_account_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'account_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::createAction',));
                    }
                    not_account_create:

                    // account_new
                    if (preg_match('#^/admin/account/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_account_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'account_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::newAction',));
                    }
                    not_account_new:

                    // account_show
                    if (preg_match('#^/admin/account/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_account_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'account_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::showAction',));
                    }
                    not_account_show:

                    // account_edit
                    if (preg_match('#^/admin/account/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_account_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'account_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::editAction',));
                    }
                    not_account_edit:

                    // account_update
                    if (preg_match('#^/admin/account/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_account_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'account_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::updateAction',));
                    }
                    not_account_update:

                    // account_delete
                    if (preg_match('#^/admin/account/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_account_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'account_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::deleteAction',));
                    }
                    not_account_delete:

                    // accountgrid
                    if (preg_match('#^/admin/account/(?P<_locale>[^/]++)/accountlist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'accountgrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'accountgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::AccountgridAction',));
                    }

                    // account_deletemodal
                    if (preg_match('#^/admin/account/(?P<_locale>[^/]++)/deleteaccount/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'account_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\AccountController::deletemodalAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/apartment')) {
                    // apartment
                    if (rtrim($pathinfo, '/') === '/admin/apartment') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_apartment;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'apartment');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::indexAction',  '_route' => 'apartment',);
                    }
                    not_apartment:

                    // apartment_create
                    if (preg_match('#^/admin/apartment/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_apartment_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartment_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::createAction',));
                    }
                    not_apartment_create:

                    // apartment_new
                    if (preg_match('#^/admin/apartment/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_apartment_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartment_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::newAction',));
                    }
                    not_apartment_new:

                    // apartment_show
                    if (preg_match('#^/admin/apartment/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_apartment_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartment_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::showAction',));
                    }
                    not_apartment_show:

                    // apartment_edit
                    if (preg_match('#^/admin/apartment/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_apartment_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartment_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::editAction',));
                    }
                    not_apartment_edit:

                    // apartment_update
                    if (preg_match('#^/admin/apartment/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_apartment_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartment_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::updateAction',));
                    }
                    not_apartment_update:

                    // apartment_delete
                    if (preg_match('#^/admin/apartment/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_apartment_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartment_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::deleteAction',));
                    }
                    not_apartment_delete:

                    // apartment_deletemodal
                    if (preg_match('#^/admin/apartment/(?P<_locale>[^/]++)/deleteapartment/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartment_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::deletemodalAction',));
                    }

                    // apartmentgrid
                    if (preg_match('#^/admin/apartment/(?P<_locale>[^/]++)/apartmentlist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'apartmentgrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartmentgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::apartmentAction',));
                    }

                    // apartmentresidentgrid
                    if (preg_match('#^/admin/apartment/(?P<_locale>[^/]++)/apartmentresident/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartmentresidentgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::apartmentresidentAction',));
                    }

                    // apartment_select_tower
                    if ($pathinfo === '/admin/apartment/residentapt') {
                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ApartmentController::TowersAction',  '_route' => 'apartment_select_tower',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/b')) {
                if (0 === strpos($pathinfo, '/admin/bank')) {
                    // bank
                    if (rtrim($pathinfo, '/') === '/admin/bank') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_bank;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'bank');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::indexAction',  '_route' => 'bank',);
                    }
                    not_bank:

                    // bank_create
                    if (preg_match('#^/admin/bank/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_bank_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bank_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::createAction',));
                    }
                    not_bank_create:

                    // bank_new
                    if (preg_match('#^/admin/bank/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_bank_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bank_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::newAction',));
                    }
                    not_bank_new:

                    // bank_show
                    if (preg_match('#^/admin/bank/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_bank_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bank_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::showAction',));
                    }
                    not_bank_show:

                    // bank_edit
                    if (preg_match('#^/admin/bank/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_bank_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bank_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::editAction',));
                    }
                    not_bank_edit:

                    // bank_update
                    if (preg_match('#^/admin/bank/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_bank_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bank_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::updateAction',));
                    }
                    not_bank_update:

                    // bank_delete
                    if (preg_match('#^/admin/bank/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_bank_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bank_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::deleteAction',));
                    }
                    not_bank_delete:

                    // bankgrid
                    if (preg_match('#^/admin/bank/(?P<_locale>[^/]++)/banklist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'bankgrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bankgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::BankgridAction',));
                    }

                    // bank_deletemodal
                    if (preg_match('#^/admin/bank/(?P<_locale>[^/]++)/deletebank/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bank_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BankController::deletemodalAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/brand')) {
                    // brand
                    if (rtrim($pathinfo, '/') === '/admin/brand') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_brand;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'brand');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::indexAction',  '_route' => 'brand',);
                    }
                    not_brand:

                    // brand_create
                    if (preg_match('#^/admin/brand/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_brand_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'brand_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::createAction',));
                    }
                    not_brand_create:

                    // brand_new
                    if (preg_match('#^/admin/brand/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_brand_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'brand_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::newAction',));
                    }
                    not_brand_new:

                    // brand_show
                    if (preg_match('#^/admin/brand/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_brand_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'brand_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::showAction',));
                    }
                    not_brand_show:

                    // brand_edit
                    if (preg_match('#^/admin/brand/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_brand_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'brand_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::editAction',));
                    }
                    not_brand_edit:

                    // brand_update
                    if (preg_match('#^/admin/brand/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_brand_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'brand_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::updateAction',));
                    }
                    not_brand_update:

                    // brand_delete
                    if (preg_match('#^/admin/brand/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_brand_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'brand_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::deleteAction',));
                    }
                    not_brand_delete:

                    // brandgrid
                    if (preg_match('#^/admin/brand/(?P<_locale>[^/]++)/brandlist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'brandgrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'brandgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::BrandgridAction',));
                    }

                    // brand_deletemodal
                    if (preg_match('#^/admin/brand/(?P<_locale>[^/]++)/deletebrand/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'brand_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\BrandController::deletemodalAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/c')) {
                if (0 === strpos($pathinfo, '/admin/cause')) {
                    // cause
                    if (rtrim($pathinfo, '/') === '/admin/cause') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_cause;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'cause');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::indexAction',  '_route' => 'cause',);
                    }
                    not_cause:

                    // cause_create
                    if (preg_match('#^/admin/cause/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_cause_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'cause_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::createAction',));
                    }
                    not_cause_create:

                    // cause_new
                    if (preg_match('#^/admin/cause/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_cause_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'cause_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::newAction',));
                    }
                    not_cause_new:

                    // cause_show
                    if (preg_match('#^/admin/cause/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_cause_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'cause_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::showAction',));
                    }
                    not_cause_show:

                    // cause_edit
                    if (preg_match('#^/admin/cause/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_cause_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'cause_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::editAction',));
                    }
                    not_cause_edit:

                    // cause_update
                    if (preg_match('#^/admin/cause/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_cause_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'cause_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::updateAction',));
                    }
                    not_cause_update:

                    // cause_delete
                    if (preg_match('#^/admin/cause/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_cause_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'cause_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::deleteAction',));
                    }
                    not_cause_delete:

                    // causegrid
                    if (preg_match('#^/admin/cause/(?P<_locale>[^/]++)/causelist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'causegrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'causegrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::CausegridAction',));
                    }

                    // cause_deletemodal
                    if (preg_match('#^/admin/cause/(?P<_locale>[^/]++)/deletecause/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'cause_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CauseController::deletemodalAction',));
                    }

                    if (0 === strpos($pathinfo, '/admin/causetype')) {
                        // causetype
                        if (rtrim($pathinfo, '/') === '/admin/causetype') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_causetype;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'causetype');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::indexAction',  '_route' => 'causetype',);
                        }
                        not_causetype:

                        // causetype_create
                        if (preg_match('#^/admin/causetype/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_causetype_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'causetype_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::createAction',));
                        }
                        not_causetype_create:

                        // causetype_new
                        if (preg_match('#^/admin/causetype/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_causetype_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'causetype_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::newAction',));
                        }
                        not_causetype_new:

                        // causetype_show
                        if (preg_match('#^/admin/causetype/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_causetype_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'causetype_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::showAction',));
                        }
                        not_causetype_show:

                        // causetype_edit
                        if (preg_match('#^/admin/causetype/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_causetype_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'causetype_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::editAction',));
                        }
                        not_causetype_edit:

                        // causetype_update
                        if (preg_match('#^/admin/causetype/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_causetype_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'causetype_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::updateAction',));
                        }
                        not_causetype_update:

                        // causetype_delete
                        if (preg_match('#^/admin/causetype/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_causetype_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'causetype_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::deleteAction',));
                        }
                        not_causetype_delete:

                        // causetypegrid
                        if (preg_match('#^/admin/causetype/(?P<_locale>[^/]++)/causetypelist/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'causetypegrid');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'causetypegrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::CausetypegridAction',));
                        }

                        // causetype_deletemodal
                        if (preg_match('#^/admin/causetype/(?P<_locale>[^/]++)/deletecause/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'causetype_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CausetypeController::deletemodalAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/co')) {
                    if (0 === strpos($pathinfo, '/admin/color')) {
                        // color
                        if (rtrim($pathinfo, '/') === '/admin/color') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_color;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'color');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::indexAction',  '_route' => 'color',);
                        }
                        not_color:

                        // color_create
                        if (preg_match('#^/admin/color/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_color_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'color_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::createAction',));
                        }
                        not_color_create:

                        // color_new
                        if (preg_match('#^/admin/color/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_color_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'color_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::newAction',));
                        }
                        not_color_new:

                        // color_show
                        if (preg_match('#^/admin/color/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_color_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'color_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::showAction',));
                        }
                        not_color_show:

                        // color_edit
                        if (preg_match('#^/admin/color/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_color_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'color_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::editAction',));
                        }
                        not_color_edit:

                        // color_update
                        if (preg_match('#^/admin/color/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_color_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'color_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::updateAction',));
                        }
                        not_color_update:

                        // color_delete
                        if (preg_match('#^/admin/color/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_color_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'color_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::deleteAction',));
                        }
                        not_color_delete:

                        // colorgrid
                        if (preg_match('#^/admin/color/(?P<_locale>[^/]++)/colorlist/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'colorgrid');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'colorgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::ColorgridAction',));
                        }

                        // color_deletemodal
                        if (preg_match('#^/admin/color/(?P<_locale>[^/]++)/deletecolor/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'color_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ColorController::deletemodalAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/company')) {
                        // company
                        if (rtrim($pathinfo, '/') === '/admin/company') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_company;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'company');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::indexAction',  '_route' => 'company',);
                        }
                        not_company:

                        // company_create
                        if (preg_match('#^/admin/company/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_company_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::createAction',));
                        }
                        not_company_create:

                        // company_new
                        if (preg_match('#^/admin/company/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_company_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::newAction',));
                        }
                        not_company_new:

                        // company_show
                        if (preg_match('#^/admin/company/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_company_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::showAction',));
                        }
                        not_company_show:

                        // company_edit
                        if (preg_match('#^/admin/company/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_company_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::editAction',));
                        }
                        not_company_edit:

                        // company_update
                        if (preg_match('#^/admin/company/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_company_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::updateAction',));
                        }
                        not_company_update:

                        // company_delete
                        if (preg_match('#^/admin/company/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_company_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::deleteAction',));
                        }
                        not_company_delete:

                        // companygrid
                        if (preg_match('#^/admin/company/(?P<_locale>[^/]++)/companylist/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'companygrid');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'companygrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::CompanygridAction',));
                        }

                        // company_deletemodal
                        if (preg_match('#^/admin/company/(?P<_locale>[^/]++)/deletecompany/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::deletemodalAction',));
                        }

                        // company_towergrid
                        if (0 === strpos($pathinfo, '/admin/company/condotower') && preg_match('#^/admin/company/condotower/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'company_towergrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\CompanyController::gettowergrid',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/constcompany')) {
                        // constcompany
                        if (rtrim($pathinfo, '/') === '/admin/constcompany') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_constcompany;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'constcompany');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::indexAction',  '_route' => 'constcompany',);
                        }
                        not_constcompany:

                        // constcompany_create
                        if (preg_match('#^/admin/constcompany/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_constcompany_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'constcompany_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::createAction',));
                        }
                        not_constcompany_create:

                        // constcompany_new
                        if (preg_match('#^/admin/constcompany/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_constcompany_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'constcompany_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::newAction',));
                        }
                        not_constcompany_new:

                        // constcompany_show
                        if (preg_match('#^/admin/constcompany/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_constcompany_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'constcompany_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::showAction',));
                        }
                        not_constcompany_show:

                        // constcompany_edit
                        if (preg_match('#^/admin/constcompany/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_constcompany_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'constcompany_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::editAction',));
                        }
                        not_constcompany_edit:

                        // constcompany_update
                        if (preg_match('#^/admin/constcompany/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_constcompany_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'constcompany_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::updateAction',));
                        }
                        not_constcompany_update:

                        // constcompany_delete
                        if (preg_match('#^/admin/constcompany/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_constcompany_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'constcompany_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::deleteAction',));
                        }
                        not_constcompany_delete:

                        // constcompanygrid
                        if (preg_match('#^/admin/constcompany/(?P<_locale>[^/]++)/constcompanylist/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'constcompanygrid');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'constcompanygrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::ConstcompanygridAction',));
                        }

                        // constcompany_deletemodal
                        if (preg_match('#^/admin/constcompany/(?P<_locale>[^/]++)/deleteconstcompany/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'constcompany_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ConstCompanyController::deletemodalAction',));
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/e')) {
                if (0 === strpos($pathinfo, '/admin/employee')) {
                    // employee
                    if (rtrim($pathinfo, '/') === '/admin/employee') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_employee;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'employee');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::indexAction',  '_route' => 'employee',);
                    }
                    not_employee:

                    // employee_create
                    if (preg_match('#^/admin/employee/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_employee_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'employee_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::createAction',));
                    }
                    not_employee_create:

                    // employee_new
                    if (preg_match('#^/admin/employee/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_employee_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'employee_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::newAction',));
                    }
                    not_employee_new:

                    // employee_show
                    if (preg_match('#^/admin/employee/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_employee_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'employee_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::showAction',));
                    }
                    not_employee_show:

                    // employee_edit
                    if (preg_match('#^/admin/employee/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_employee_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'employee_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::editAction',));
                    }
                    not_employee_edit:

                    // employee_update
                    if (preg_match('#^/admin/employee/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_employee_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'employee_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::updateAction',));
                    }
                    not_employee_update:

                    // employee_delete
                    if (preg_match('#^/admin/employee/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_employee_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'employee_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::deleteAction',));
                    }
                    not_employee_delete:

                    // employeegrid
                    if (preg_match('#^/admin/employee/(?P<_locale>[^/]++)/employeelist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'employeegrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'employeegrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::employeegridAction',));
                    }

                    // employee_deletemodal
                    if (preg_match('#^/admin/employee/(?P<_locale>[^/]++)/deleteemployee/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'employee_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::deletemodalAction',));
                    }

                    // employee_tower
                    if ($pathinfo === '/admin/employee/residenttower') {
                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\EmployeeController::TowersAction',  '_route' => 'employee_tower',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/expense')) {
                    // expense
                    if (rtrim($pathinfo, '/') === '/admin/expense') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_expense;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'expense');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::indexAction',  '_route' => 'expense',);
                    }
                    not_expense:

                    // expense_create
                    if (preg_match('#^/admin/expense/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_expense_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'expense_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::createAction',));
                    }
                    not_expense_create:

                    // expense_new
                    if (preg_match('#^/admin/expense/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_expense_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'expense_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::newAction',));
                    }
                    not_expense_new:

                    // expense_show
                    if (preg_match('#^/admin/expense/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_expense_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'expense_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::showAction',));
                    }
                    not_expense_show:

                    // expense_edit
                    if (preg_match('#^/admin/expense/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_expense_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'expense_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::editAction',));
                    }
                    not_expense_edit:

                    // expense_update
                    if (preg_match('#^/admin/expense/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_expense_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'expense_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::updateAction',));
                    }
                    not_expense_update:

                    // expense_delete
                    if (preg_match('#^/admin/expense/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_expense_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'expense_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::deleteAction',));
                    }
                    not_expense_delete:

                    // expensegrid
                    if (preg_match('#^/admin/expense/(?P<_locale>[^/]++)/expenselist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'expensegrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'expensegrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::ExpensegridAction',));
                    }

                    // expense_deletemodal
                    if (preg_match('#^/admin/expense/(?P<_locale>[^/]++)/deleteexpense/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'expense_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::deletemodalAction',));
                    }

                    if (0 === strpos($pathinfo, '/admin/expense/expense')) {
                        // expense_select_tower
                        if ($pathinfo === '/admin/expense/expenseapt') {
                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::TowersAction',  '_route' => 'expense_select_tower',);
                        }

                        // expense_select_provider
                        if ($pathinfo === '/admin/expense/expenseprovider') {
                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseController::ProviderAction',  '_route' => 'expense_select_provider',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/expenseinvoice')) {
                        // expenseinvoice
                        if (rtrim($pathinfo, '/') === '/admin/expenseinvoice') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_expenseinvoice;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'expenseinvoice');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::indexAction',  '_route' => 'expenseinvoice',);
                        }
                        not_expenseinvoice:

                        // expenseinvoice_create
                        if (preg_match('#^/admin/expenseinvoice/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_expenseinvoice_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'expenseinvoice_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::createAction',));
                        }
                        not_expenseinvoice_create:

                        // expenseinvoice_new
                        if (preg_match('#^/admin/expenseinvoice/(?P<_locale>[^/]++)/(?P<id>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_expenseinvoice_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'expenseinvoice_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::newAction',));
                        }
                        not_expenseinvoice_new:

                        // expenseinvoice_show
                        if (preg_match('#^/admin/expenseinvoice/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_expenseinvoice_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'expenseinvoice_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::showAction',));
                        }
                        not_expenseinvoice_show:

                        // expenseinvoice_edit
                        if (preg_match('#^/admin/expenseinvoice/(?P<_locale>[^/]++)/(?P<id>[^/]++)/(?P<expid>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_expenseinvoice_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'expenseinvoice_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::editAction',));
                        }
                        not_expenseinvoice_edit:

                        // expenseinvoice_update
                        if (preg_match('#^/admin/expenseinvoice/(?P<_locale>[^/]++)/(?P<id>[^/]++)/(?P<expid>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_expenseinvoice_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'expenseinvoice_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::updateAction',));
                        }
                        not_expenseinvoice_update:

                        // expenseinvoice_delete
                        if (preg_match('#^/admin/expenseinvoice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_expenseinvoice_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'expenseinvoice_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::deleteAction',));
                        }
                        not_expenseinvoice_delete:

                        // expenseinvoicegrid
                        if (0 === strpos($pathinfo, '/admin/expenseinvoice/expensedocuments') && preg_match('#^/admin/expenseinvoice/expensedocuments/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'expenseinvoicegrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::Expensedocumentsgrid',));
                        }

                        // expenseinvoice_deletemodal
                        if (preg_match('#^/admin/expenseinvoice/(?P<_locale>[^/]++)/deleteexpenseinvoice/(?P<expid>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'expenseinvoice_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::deletemodalAction',));
                        }

                        // download_file
                        if (preg_match('#^/admin/expenseinvoice/(?P<_locale>[^/]++)/download_file/(?P<fileId>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'download_file')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ExpenseInvoiceController::downloadFileAction',));
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/income')) {
                // income
                if (rtrim($pathinfo, '/') === '/admin/income') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_income;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'income');
                    }

                    return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::indexAction',  '_route' => 'income',);
                }
                not_income:

                // income_create
                if (preg_match('#^/admin/income/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_income_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'income_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::createAction',));
                }
                not_income_create:

                // income_new
                if (preg_match('#^/admin/income/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_income_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'income_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::newAction',));
                }
                not_income_new:

                // income_show
                if (preg_match('#^/admin/income/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_income_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'income_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::showAction',));
                }
                not_income_show:

                // income_edit
                if (preg_match('#^/admin/income/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_income_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'income_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::editAction',));
                }
                not_income_edit:

                // income_update
                if (preg_match('#^/admin/income/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_income_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'income_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::updateAction',));
                }
                not_income_update:

                // income_delete
                if (preg_match('#^/admin/income/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_income_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'income_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::deleteAction',));
                }
                not_income_delete:

                // incomegrid
                if (preg_match('#^/admin/income/(?P<_locale>[^/]++)/incomelist/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'incomegrid');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'incomegrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::IncomegridAction',));
                }

                // income_deletemodal
                if (preg_match('#^/admin/income/(?P<_locale>[^/]++)/deleteincome/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'income_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::deletemodalAction',));
                }

                // income_select_tower
                if ($pathinfo === '/admin/income/incomeapt') {
                    return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeController::TowersAction',  '_route' => 'income_select_tower',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/incomeinvoice')) {
            // incomeinvoice
            if (rtrim($pathinfo, '/') === '/incomeinvoice') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_incomeinvoice;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'incomeinvoice');
                }

                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeInvoiceController::indexAction',  '_route' => 'incomeinvoice',);
            }
            not_incomeinvoice:

            // incomeinvoice_create
            if ($pathinfo === '/incomeinvoice/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_incomeinvoice_create;
                }

                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeInvoiceController::createAction',  '_route' => 'incomeinvoice_create',);
            }
            not_incomeinvoice_create:

            // incomeinvoice_new
            if ($pathinfo === '/incomeinvoice/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_incomeinvoice_new;
                }

                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeInvoiceController::newAction',  '_route' => 'incomeinvoice_new',);
            }
            not_incomeinvoice_new:

            // incomeinvoice_show
            if (preg_match('#^/incomeinvoice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_incomeinvoice_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'incomeinvoice_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeInvoiceController::showAction',));
            }
            not_incomeinvoice_show:

            // incomeinvoice_edit
            if (preg_match('#^/incomeinvoice/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_incomeinvoice_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'incomeinvoice_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeInvoiceController::editAction',));
            }
            not_incomeinvoice_edit:

            // incomeinvoice_update
            if (preg_match('#^/incomeinvoice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_incomeinvoice_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'incomeinvoice_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeInvoiceController::updateAction',));
            }
            not_incomeinvoice_update:

            // incomeinvoice_delete
            if (preg_match('#^/incomeinvoice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_incomeinvoice_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'incomeinvoice_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\IncomeInvoiceController::deleteAction',));
            }
            not_incomeinvoice_delete:

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/location')) {
                // location
                if (rtrim($pathinfo, '/') === '/admin/location') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_location;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'location');
                    }

                    return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::indexAction',  '_route' => 'location',);
                }
                not_location:

                // location_create
                if (preg_match('#^/admin/location/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_location_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::createAction',));
                }
                not_location_create:

                // location_new
                if (preg_match('#^/admin/location/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_location_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::newAction',));
                }
                not_location_new:

                // location_show
                if (preg_match('#^/admin/location/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_location_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::showAction',));
                }
                not_location_show:

                // location_edit
                if (preg_match('#^/admin/location/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_location_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::editAction',));
                }
                not_location_edit:

                // location_update
                if (preg_match('#^/admin/location/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_location_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::updateAction',));
                }
                not_location_update:

                // location_delete
                if (preg_match('#^/admin/location/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_location_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::deleteAction',));
                }
                not_location_delete:

                // locationgrid
                if (preg_match('#^/admin/location/(?P<_locale>[^/]++)/locationlist/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'locationgrid');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'locationgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::LocationgridAction',));
                }

                // location_deletemodal
                if (preg_match('#^/admin/location/(?P<_locale>[^/]++)/deletelocation/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'location_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\LocationController::deletemodalAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/p')) {
                if (0 === strpos($pathinfo, '/admin/pa')) {
                    if (0 === strpos($pathinfo, '/admin/parking')) {
                        // parking
                        if (rtrim($pathinfo, '/') === '/admin/parking') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_parking;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'parking');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::indexAction',  '_route' => 'parking',);
                        }
                        not_parking:

                        // parking_create
                        if (preg_match('#^/admin/parking/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_parking_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'parking_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::createAction',));
                        }
                        not_parking_create:

                        // parking_new
                        if (preg_match('#^/admin/parking/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_parking_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'parking_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::newAction',));
                        }
                        not_parking_new:

                        // parking_show
                        if (preg_match('#^/admin/parking/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_parking_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'parking_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::showAction',));
                        }
                        not_parking_show:

                        // parking_edit
                        if (preg_match('#^/admin/parking/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_parking_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'parking_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::editAction',));
                        }
                        not_parking_edit:

                        // parking_update
                        if (preg_match('#^/admin/parking/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_parking_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'parking_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::updateAction',));
                        }
                        not_parking_update:

                        // parking_delete
                        if (0 === strpos($pathinfo, '/admin/parking/{_locale') && preg_match('#^/admin/parking/\\{_locale/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_parking_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'parking_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::deleteAction',));
                        }
                        not_parking_delete:

                        // parkinggrid
                        if (preg_match('#^/admin/parking/(?P<_locale>[^/]++)/parkinglist/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'parkinggrid');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'parkinggrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::ResidentgridAction',));
                        }

                        // parking_deletemodal
                        if (preg_match('#^/admin/parking/(?P<_locale>[^/]++)/deleteparking/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'parking_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::deletemodalAction',));
                        }

                        if (0 === strpos($pathinfo, '/admin/parking/parking')) {
                            // parking_select_tower
                            if ($pathinfo === '/admin/parking/parkingtower') {
                                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::TowersAction',  '_route' => 'parking_select_tower',);
                            }

                            // parking_select_apartment
                            if ($pathinfo === '/admin/parking/parkingapt') {
                                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ParkingController::ApartmentsAction',  '_route' => 'parking_select_apartment',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/payment')) {
                        // payment
                        if (rtrim($pathinfo, '/') === '/admin/payment') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_payment;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'payment');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::indexAction',  '_route' => 'payment',);
                        }
                        not_payment:

                        // payment_create
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_payment_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'payment_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::createAction',));
                        }
                        not_payment_create:

                        // payment_new
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_payment_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'payment_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::newAction',));
                        }
                        not_payment_new:

                        // payment_show
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_payment_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'payment_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::showAction',));
                        }
                        not_payment_show:

                        // payment_edit
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_payment_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'payment_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::editAction',));
                        }
                        not_payment_edit:

                        // payment_update
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_payment_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'payment_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::updateAction',));
                        }
                        not_payment_update:

                        // payment_delete
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_payment_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'payment_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::deleteAction',));
                        }
                        not_payment_delete:

                        // paymentgrid
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/paymentlist/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'paymentgrid');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::PaymentgridAction',));
                        }

                        // payment_deletemodal
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/deletepayment/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'payment_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::deletemodalAction',));
                        }

                        if (0 === strpos($pathinfo, '/admin/payment/payment')) {
                            // payment_select_tower
                            if ($pathinfo === '/admin/payment/paymenttower') {
                                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::TowersAction',  '_route' => 'payment_select_tower',);
                            }

                            // payment_select_apartment
                            if ($pathinfo === '/admin/payment/paymentapt') {
                                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::ApartmentsAction',  '_route' => 'payment_select_apartment',);
                            }

                        }

                        // paymentinvoice
                        if (preg_match('#^/admin/payment/(?P<_locale>[^/]++)/(?P<id>[^/]++)/(?P<namevoucher>[^/\\.]++)\\.pdf$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentinvoice')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentController::PaymentInvoiceAction',));
                        }

                        if (0 === strpos($pathinfo, '/admin/paymentmethod')) {
                            // paymentmethod
                            if (rtrim($pathinfo, '/') === '/admin/paymentmethod') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_paymentmethod;
                                }

                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'paymentmethod');
                                }

                                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::indexAction',  '_route' => 'paymentmethod',);
                            }
                            not_paymentmethod:

                            // paymentmethod_create
                            if (preg_match('#^/admin/paymentmethod/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'POST') {
                                    $allow[] = 'POST';
                                    goto not_paymentmethod_create;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentmethod_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::createAction',));
                            }
                            not_paymentmethod_create:

                            // paymentmethod_new
                            if (preg_match('#^/admin/paymentmethod/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_paymentmethod_new;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentmethod_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::newAction',));
                            }
                            not_paymentmethod_new:

                            // paymentmethod_show
                            if (preg_match('#^/admin/paymentmethod/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_paymentmethod_show;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentmethod_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::showAction',));
                            }
                            not_paymentmethod_show:

                            // paymentmethod_edit
                            if (preg_match('#^/admin/paymentmethod/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_paymentmethod_edit;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentmethod_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::editAction',));
                            }
                            not_paymentmethod_edit:

                            // paymentmethod_update
                            if (preg_match('#^/admin/paymentmethod/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'PUT') {
                                    $allow[] = 'PUT';
                                    goto not_paymentmethod_update;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentmethod_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::updateAction',));
                            }
                            not_paymentmethod_update:

                            // paymentmethod_delete
                            if (preg_match('#^/admin/paymentmethod/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'DELETE') {
                                    $allow[] = 'DELETE';
                                    goto not_paymentmethod_delete;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentmethod_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::deleteAction',));
                            }
                            not_paymentmethod_delete:

                            // paymentmethodgrid
                            if (preg_match('#^/admin/paymentmethod/(?P<_locale>[^/]++)/paymentmethodlist/?$#s', $pathinfo, $matches)) {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'paymentmethodgrid');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentmethodgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::PaymentmethodgridAction',));
                            }

                            // paymentmethod_deletemodal
                            if (preg_match('#^/admin/paymentmethod/(?P<_locale>[^/]++)/deletepaymentmethod/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paymentmethod_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\PaymentmethodController::deletemodalAction',));
                            }

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/provider')) {
                    // provider
                    if (rtrim($pathinfo, '/') === '/admin/provider') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_provider;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'provider');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::indexAction',  '_route' => 'provider',);
                    }
                    not_provider:

                    // provider_create
                    if (preg_match('#^/admin/provider/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_provider_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'provider_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::createAction',));
                    }
                    not_provider_create:

                    // provider_new
                    if (preg_match('#^/admin/provider/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_provider_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'provider_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::newAction',));
                    }
                    not_provider_new:

                    // provider_show
                    if (preg_match('#^/admin/provider/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_provider_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'provider_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::showAction',));
                    }
                    not_provider_show:

                    // provider_edit
                    if (preg_match('#^/admin/provider/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_provider_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'provider_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::editAction',));
                    }
                    not_provider_edit:

                    // provider_update
                    if (preg_match('#^/admin/provider/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_provider_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'provider_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::updateAction',));
                    }
                    not_provider_update:

                    // provider_delete
                    if (preg_match('#^/admin/provider/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_provider_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'provider_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::deleteAction',));
                    }
                    not_provider_delete:

                    // providergrid
                    if (preg_match('#^/admin/provider/(?P<_locale>[^/]++)/providerlist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'providergrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'providergrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::providergridAction',));
                    }

                    // provider_deletemodal
                    if (preg_match('#^/admin/provider/(?P<_locale>[^/]++)/deleteprovider/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'provider_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::deletemodalAction',));
                    }

                    // provider_select_tower
                    if ($pathinfo === '/admin/provider/providertower') {
                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ProviderController::TowersAction',  '_route' => 'provider_select_tower',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/res')) {
                if (0 === strpos($pathinfo, '/admin/reservation')) {
                    // reservation
                    if (rtrim($pathinfo, '/') === '/admin/reservation') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_reservation;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'reservation');
                        }

                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::indexAction',  '_route' => 'reservation',);
                    }
                    not_reservation:

                    // reservation_create
                    if (preg_match('#^/admin/reservation/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_reservation_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::createAction',));
                    }
                    not_reservation_create:

                    // reservation_new
                    if (preg_match('#^/admin/reservation/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_reservation_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::newAction',));
                    }
                    not_reservation_new:

                    // reservation_show
                    if (preg_match('#^/admin/reservation/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_reservation_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::showAction',));
                    }
                    not_reservation_show:

                    // reservation_edit
                    if (preg_match('#^/admin/reservation/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_reservation_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::editAction',));
                    }
                    not_reservation_edit:

                    // reservation_update
                    if (preg_match('#^/admin/reservation/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_reservation_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::updateAction',));
                    }
                    not_reservation_update:

                    // reservationgrid
                    if (preg_match('#^/admin/reservation/(?P<_locale>[^/]++)/reservations/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'reservationgrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservationgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::ReservationgridAction',));
                    }

                    // reservation_deletemodal
                    if (preg_match('#^/admin/reservation/(?P<_locale>[^/]++)/deletereservation/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::deletemodalAction',));
                    }

                    if (0 === strpos($pathinfo, '/admin/reservation/reservation')) {
                        // reservation_select_tower
                        if ($pathinfo === '/admin/reservation/reservationtower') {
                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::TowersAction',  '_route' => 'reservation_select_tower',);
                        }

                        // reservation_select_apartment
                        if ($pathinfo === '/admin/reservation/reservationapt') {
                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ReservationController::ApartmentsAction',  '_route' => 'reservation_select_apartment',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/resident')) {
                    if (0 === strpos($pathinfo, '/admin/residents')) {
                        // resident
                        if (rtrim($pathinfo, '/') === '/admin/residents') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_resident;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'resident');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::indexAction',  '_route' => 'resident',);
                        }
                        not_resident:

                        // resident_create
                        if (preg_match('#^/admin/residents/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_resident_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'resident_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::createAction',));
                        }
                        not_resident_create:

                        // residents_new
                        if (preg_match('#^/admin/residents/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_residents_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residents_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::newAction',));
                        }
                        not_residents_new:

                        // residents_show
                        if (preg_match('#^/admin/residents/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_residents_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residents_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::showAction',));
                        }
                        not_residents_show:

                        // residents_edit
                        if (preg_match('#^/admin/residents/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_residents_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residents_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::editAction',));
                        }
                        not_residents_edit:

                        // resident_update
                        if (preg_match('#^/admin/residents/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_resident_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'resident_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::updateAction',));
                        }
                        not_resident_update:

                        // resident_delete
                        if (preg_match('#^/admin/residents/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_resident_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'resident_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::deleteAction',));
                        }
                        not_resident_delete:

                        // residentsgrid
                        if (preg_match('#^/admin/residents/(?P<_locale>[^/]++)/residentlist/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'residentsgrid');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residentsgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::ResidentgridAction',));
                        }

                        // resident_deletemodal
                        if (preg_match('#^/admin/residents/(?P<_locale>[^/]++)/deleteresident/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'resident_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::deletemodalAction',));
                        }

                        if (0 === strpos($pathinfo, '/admin/residents/resident')) {
                            // resident_select_tower
                            if ($pathinfo === '/admin/residents/residenttower') {
                                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::TowersAction',  '_route' => 'resident_select_tower',);
                            }

                            // resident_select_apartment
                            if ($pathinfo === '/admin/residents/residentapt') {
                                return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::ApartmentsAction',  '_route' => 'resident_select_apartment',);
                            }

                        }

                        // apartmentbytower
                        if ($pathinfo === '/admin/residents/listBytower') {
                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidentController::getByApartmentId',  '_route' => 'apartmentbytower',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/residenttype')) {
                        // residenttype
                        if (rtrim($pathinfo, '/') === '/admin/residenttype') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_residenttype;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'residenttype');
                            }

                            return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::indexAction',  '_route' => 'residenttype',);
                        }
                        not_residenttype:

                        // residenttype_create
                        if (preg_match('#^/admin/residenttype/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_residenttype_create;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residenttype_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::createAction',));
                        }
                        not_residenttype_create:

                        // residenttype_new
                        if (preg_match('#^/admin/residenttype/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_residenttype_new;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residenttype_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::newAction',));
                        }
                        not_residenttype_new:

                        // residenttype_show
                        if (preg_match('#^/admin/residenttype/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_residenttype_show;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residenttype_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::showAction',));
                        }
                        not_residenttype_show:

                        // residenttype_edit
                        if (preg_match('#^/admin/residenttype/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_residenttype_edit;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residenttype_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::editAction',));
                        }
                        not_residenttype_edit:

                        // residenttype_update
                        if (preg_match('#^/admin/residenttype/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_residenttype_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residenttype_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::updateAction',));
                        }
                        not_residenttype_update:

                        // residenttype_delete
                        if (preg_match('#^/admin/residenttype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_residenttype_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residenttype_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::deleteAction',));
                        }
                        not_residenttype_delete:

                        // typeresidentgrid
                        if (preg_match('#^/admin/residenttype/(?P<_locale>[^/]++)/typeresidentlist/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'typeresidentgrid');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'typeresidentgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::residenttypegridAction',));
                        }

                        // residenttype_deletemodal
                        if (preg_match('#^/admin/residenttype/(?P<_locale>[^/]++)/deleteresidenttype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'residenttype_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\ResidenttypeController::deletemodalAction',));
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/statement')) {
                // statementview
                if (preg_match('#^/admin/statement/(?P<_locale>[^/]++)/statementview$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_statementview;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'statementview')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\StatementofaccountController::StatementparamsAction',));
                }
                not_statementview:

                // statement_select_tower
                if ($pathinfo === '/admin/statement/statementtower') {
                    return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\StatementofaccountController::TowersAction',  '_route' => 'statement_select_tower',);
                }

                // statementexcel
                if (preg_match('#^/admin/statement/(?P<_locale>[^/]++)/(?P<info>[^/]++)/statementexcel$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'statementexcel')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\StatementofaccountController::StatementexcelAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/tower')) {
                // towerindex
                if (rtrim($pathinfo, '/') === '/admin/tower') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_towerindex;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'towerindex');
                    }

                    return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::indexAction',  '_route' => 'towerindex',);
                }
                not_towerindex:

                // tower_create
                if (preg_match('#^/admin/tower/(?P<_locale>[^/]++)/new_tower$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_tower_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tower_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::createAction',));
                }
                not_tower_create:

                // tower_new
                if (preg_match('#^/admin/tower/(?P<_locale>[^/]++)/new_tower$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_tower_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tower_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::newAction',));
                }
                not_tower_new:

                // tower_show
                if (preg_match('#^/admin/tower/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tower_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::showAction',));
                }

                // tower_edit
                if (preg_match('#^/admin/tower/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_tower_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tower_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::editAction',));
                }
                not_tower_edit:

                // tower_update
                if (preg_match('#^/admin/tower/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_tower_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tower_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::updateAction',));
                }
                not_tower_update:

                // tower_delete
                if (preg_match('#^/admin/tower/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_tower_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tower_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::deleteAction',));
                }
                not_tower_delete:

                // tower_deletemodal
                if (preg_match('#^/admin/tower/(?P<_locale>[^/]++)/deletetower/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tower_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::deletemodalAction',));
                }

                // towergrid
                if (preg_match('#^/admin/tower/(?P<_locale>[^/]++)/towerlist/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'towergrid');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'towergrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::towergridAction',));
                }

                if (0 === strpos($pathinfo, '/admin/tower/tower')) {
                    // tower_apartmentgrid
                    if (0 === strpos($pathinfo, '/admin/tower/towerapartment') && preg_match('#^/admin/tower/towerapartment/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'tower_apartmentgrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::getapartmentgrid',));
                    }

                    // gridemployee
                    if (0 === strpos($pathinfo, '/admin/tower/toweremployees') && preg_match('#^/admin/tower/toweremployees/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'gridemployee')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\TowerController::gridemployeeAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/vehicle')) {
                // vehicle
                if (rtrim($pathinfo, '/') === '/admin/vehicle') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_vehicle;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'vehicle');
                    }

                    return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::indexAction',  '_route' => 'vehicle',);
                }
                not_vehicle:

                // vehicle_create
                if (preg_match('#^/admin/vehicle/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_vehicle_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_create')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::createAction',));
                }
                not_vehicle_create:

                // vehicle_new
                if (preg_match('#^/admin/vehicle/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_vehicle_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_new')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::newAction',));
                }
                not_vehicle_new:

                // vehicle_show
                if (preg_match('#^/admin/vehicle/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_vehicle_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_show')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::showAction',));
                }
                not_vehicle_show:

                // vehicle_edit
                if (preg_match('#^/admin/vehicle/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_vehicle_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_edit')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::editAction',));
                }
                not_vehicle_edit:

                // vehicle_update
                if (preg_match('#^/admin/vehicle/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_vehicle_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_update')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::updateAction',));
                }
                not_vehicle_update:

                // vehicle_delete
                if (preg_match('#^/admin/vehicle/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_vehicle_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_delete')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::deleteAction',));
                }
                not_vehicle_delete:

                // vehiclegrid
                if (preg_match('#^/admin/vehicle/(?P<_locale>[^/]++)/vehiclelist/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'vehiclegrid');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehiclegrid')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::vehiclegridAction',));
                }

                // vehicle_deletemodal
                if (preg_match('#^/admin/vehicle/(?P<_locale>[^/]++)/deletevehicle/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_deletemodal')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::deletemodalAction',));
                }

                if (0 === strpos($pathinfo, '/admin/vehicle/vehicle')) {
                    // vehicle_select_tower
                    if ($pathinfo === '/admin/vehicle/vehicletower') {
                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::TowersAction',  '_route' => 'vehicle_select_tower',);
                    }

                    // vehicle_select_apartment
                    if ($pathinfo === '/admin/vehicle/vehicleapt') {
                        return array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::ApartmentsAction',  '_route' => 'vehicle_select_apartment',);
                    }

                }

                // vehicle_select_resident
                if (preg_match('#^/admin/vehicle/(?P<_locale>[^/]++)/vehicleresident$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_select_resident')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\VehicleController::ResidentAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/statement')) {
                // statementgenerate
                if (preg_match('#^/admin/statement/(?P<_locale>[^/]++)/statementgenerate$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'statementgenerate')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\StatementofaccountController::generatestatementAction',));
                }

                // statementpdf
                if (preg_match('#^/admin/statement/(?P<_locale>[^/]++)/(?P<year>[^/]++)/(?P<month>[^/]++)/(?P<towerid>[^/]++)/(?P<namestatement>[^/\\.]++)\\.pdf$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'statementpdf')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\StatementofaccountController::StatementpdfAction',));
                }

                // statementshow
                if (preg_match('#^/admin/statement/(?P<_locale>[^/]++)/(?P<year>[^/]++)/(?P<month>[^/]++)/(?P<towerid>[^/]++)/statementshow$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'statementshow')), array (  '_controller' => 'Apartamentos\\ApartamentosBundle\\Controller\\StatementofaccountController::StatementshowAction',));
                }

            }

        }

        // login_login_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'login_login_homepage')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/usuarios')) {
            // usuarios_listar
            if ($pathinfo === '/usuarios/listar') {
                return array (  '_controller' => 'LoginLoginBundle:Usuarios:listar',  '_route' => 'usuarios_listar',);
            }

            // usuarios_editar
            if (0 === strpos($pathinfo, '/usuarios/editar') && preg_match('#^/usuarios/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuarios_editar')), array (  '_controller' => 'LoginLoginBundle:Usuarios:update',));
            }

            // usuarios_visualizar
            if (0 === strpos($pathinfo, '/usuarios/visualizar') && preg_match('#^/usuarios/visualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuarios_visualizar')), array (  '_controller' => 'LoginLoginBundle:Usuarios:visualizar',));
            }

            // apartamentos_borrar
            if (0 === strpos($pathinfo, '/usuarios/borrar') && preg_match('#^/usuarios/borrar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'apartamentos_borrar')), array (  '_controller' => 'LoginLoginBundle:Usuarios:delete',));
            }

            // usuario_new
            if ($pathinfo === '/usuarios/new') {
                return array (  '_controller' => 'LoginLoginBundle:Usuarios:new',  '_route' => 'usuario_new',);
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/actions')) {
                // action_create
                if (preg_match('#^/admin/actions/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_action_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_create')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\ActionController::createAction',));
                }
                not_action_create:

                // action_new
                if (preg_match('#^/admin/actions/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_action_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_new')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\ActionController::newAction',));
                }
                not_action_new:

                // action_show
                if (preg_match('#^/admin/actions/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_action_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_show')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\ActionController::showAction',));
                }
                not_action_show:

                // action_edit
                if (preg_match('#^/admin/actions/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_action_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_edit')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\ActionController::editAction',));
                }
                not_action_edit:

                // action_update
                if (preg_match('#^/admin/actions/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_action_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_update')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\ActionController::updateAction',));
                }
                not_action_update:

                // action_delete
                if (preg_match('#^/admin/actions/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_action_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_delete')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\ActionController::deleteAction',));
                }
                not_action_delete:

                // actiongrid
                if (preg_match('#^/admin/actions/(?P<_locale>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'actiongrid')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\ActionController::actiongrid',));
                }

                // action_deletemodal
                if (preg_match('#^/admin/actions/(?P<_locale>[^/]++)/deleaction/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_deletemodal')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\ActionController::deletemodalAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/multiparam')) {
                // multiparam
                if (rtrim($pathinfo, '/') === '/admin/multiparam') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_multiparam;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'multiparam');
                    }

                    return array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::indexAction',  '_route' => 'multiparam',);
                }
                not_multiparam:

                // multiparam_create
                if (preg_match('#^/admin/multiparam/(?P<_locale>[^/]++)/(?P<sysparamid>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_multiparam_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'multiparam_create')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::createAction',));
                }
                not_multiparam_create:

                // multiparam_new
                if (preg_match('#^/admin/multiparam/(?P<_locale>[^/]++)/(?P<sysparamid>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_multiparam_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'multiparam_new')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::newAction',));
                }
                not_multiparam_new:

                // multiparam_show
                if (preg_match('#^/admin/multiparam/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_multiparam_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'multiparam_show')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::showAction',));
                }
                not_multiparam_show:

                // multiparam_edit
                if (preg_match('#^/admin/multiparam/(?P<_locale>[^/]++)/(?P<id>[^/]++)/(?P<sysparamid>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_multiparam_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'multiparam_edit')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::editAction',));
                }
                not_multiparam_edit:

                // multiparam_update
                if (preg_match('#^/admin/multiparam/(?P<_locale>[^/]++)/(?P<id>[^/]++)/(?P<sysparamid>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_multiparam_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'multiparam_update')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::updateAction',));
                }
                not_multiparam_update:

                // multiparam_delete
                if (preg_match('#^/admin/multiparam/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_multiparam_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'multiparam_delete')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::deleteAction',));
                }
                not_multiparam_delete:

                // multiparamgrid
                if (0 === strpos($pathinfo, '/admin/multiparam/multiparamgrid') && preg_match('#^/admin/multiparam/multiparamgrid/(?P<_locale>[^/]++)/(?P<sysparamid>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'multiparamgrid')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::multiparamgrid',));
                }

                // action_deletemultiparam
                if (preg_match('#^/admin/multiparam/(?P<_locale>[^/]++)/delemultiparam/(?P<sysparamid>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_deletemultiparam')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\MultiparamController::deletemodalAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/role')) {
                // admin_role
                if (rtrim($pathinfo, '/') === '/admin/role') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_role;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_role');
                    }

                    return array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::indexAction',  '_route' => 'admin_role',);
                }
                not_admin_role:

                // admin_role_create
                if (preg_match('#^/admin/role/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_role_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_role_create')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::createAction',));
                }
                not_admin_role_create:

                // admin_role_new
                if (preg_match('#^/admin/role/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_role_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_role_new')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::newAction',));
                }
                not_admin_role_new:

                // admin_role_show
                if (preg_match('#^/admin/role/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_role_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_role_show')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::showAction',));
                }
                not_admin_role_show:

                // admin_role_edit
                if (preg_match('#^/admin/role/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_role_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_role_edit')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::editAction',));
                }
                not_admin_role_edit:

                // admin_role_update
                if (preg_match('#^/admin/role/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_admin_role_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_role_update')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::updateAction',));
                }
                not_admin_role_update:

                // admin_role_delete
                if (preg_match('#^/admin/role/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_admin_role_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_role_delete')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::deleteAction',));
                }
                not_admin_role_delete:

                // role_deletemodal
                if (preg_match('#^/admin/role/(?P<_locale>[^/]++)/deleterole/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'role_deletemodal')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::deletemodalAction',));
                }

                if (0 === strpos($pathinfo, '/admin/roleaction')) {
                    // roleaction
                    if (rtrim($pathinfo, '/') === '/admin/roleaction') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_roleaction;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'roleaction');
                        }

                        return array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::indexAction',  '_route' => 'roleaction',);
                    }
                    not_roleaction:

                    // roleaction_create
                    if (preg_match('#^/admin/roleaction/(?P<_locale>[^/]++)/(?P<roleid>[^/]++)/$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_roleaction_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'roleaction_create')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::createAction',));
                    }
                    not_roleaction_create:

                    // roleaction_new
                    if (preg_match('#^/admin/roleaction/(?P<_locale>[^/]++)/(?P<roleid>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_roleaction_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'roleaction_new')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::newAction',));
                    }
                    not_roleaction_new:

                    // roleaction_show
                    if (preg_match('#^/admin/roleaction/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_roleaction_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'roleaction_show')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::showAction',));
                    }
                    not_roleaction_show:

                    // roleaction_edit
                    if (preg_match('#^/admin/roleaction/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_roleaction_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'roleaction_edit')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::editAction',));
                    }
                    not_roleaction_edit:

                    // roleaction_update
                    if (preg_match('#^/admin/roleaction/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_roleaction_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'roleaction_update')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::updateAction',));
                    }
                    not_roleaction_update:

                    // roleaction_delete
                    if (preg_match('#^/admin/roleaction/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_roleaction_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'roleaction_delete')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::deleteAction',));
                    }
                    not_roleaction_delete:

                    // roleactiongrid
                    if (preg_match('#^/admin/roleaction/(?P<_locale>[^/]++)/(?P<roleid>[^/]++)/roleactions/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'roleactiongrid');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'roleactiongrid')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::roleactiongrid',));
                    }

                    // roleaction_deletemodal
                    if (preg_match('#^/admin/roleaction/(?P<_locale>[^/]++)/deleteroleaction/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'roleaction_deletemodal')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::deletemodalAction',));
                    }

                    // Rolenametwig
                    if (preg_match('#^/admin/roleaction/(?P<_locale>[^/]++)/(?P<roleid>[^/]++)/getrolename/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'Rolenametwig');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Rolenametwig')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleactionController::Rolenametwig',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/login')) {
                // login
                if ($pathinfo === '/admin/login') {
                    return array (  '_controller' => 'Login\\LoginBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/admin/login_check') {
                    return array (  '_controller' => 'Login\\LoginBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login_check',);
                }

            }

            // iniciologin
            if (0 === strpos($pathinfo, '/admin/inicio') && preg_match('#^/admin/inicio/(?P<_locale>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'iniciologin')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SecurityController::inicioAction',));
            }

            if (0 === strpos($pathinfo, '/admin/sysparams')) {
                // sysparam
                if (rtrim($pathinfo, '/') === '/admin/sysparams') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sysparam;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sysparam');
                    }

                    return array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::indexAction',  '_route' => 'sysparam',);
                }
                not_sysparam:

                // sysparam_create
                if (preg_match('#^/admin/sysparams/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sysparam_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sysparam_create')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::createAction',));
                }
                not_sysparam_create:

                // sysparam_new
                if (preg_match('#^/admin/sysparams/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sysparam_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sysparam_new')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::newAction',));
                }
                not_sysparam_new:

                // sysparam_show
                if (preg_match('#^/admin/sysparams/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sysparam_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sysparam_show')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::showAction',));
                }
                not_sysparam_show:

                // sysparam_edit
                if (preg_match('#^/admin/sysparams/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sysparam_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sysparam_edit')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::editAction',));
                }
                not_sysparam_edit:

                // sysparam_update
                if (preg_match('#^/admin/sysparams/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sysparam_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sysparam_update')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::updateAction',));
                }
                not_sysparam_update:

                // sysparam_delete
                if (preg_match('#^/admin/sysparams/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sysparam_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sysparam_delete')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::deleteAction',));
                }
                not_sysparam_delete:

                // sysparamgrid
                if (preg_match('#^/admin/sysparams/(?P<_locale>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sysparamgrid')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::sysparamgrid',));
                }

                // action_deletesysparam
                if (preg_match('#^/admin/sysparams/(?P<_locale>[^/]++)/delesysparam/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_deletesysparam')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\SysparamController::deletemodalAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/user')) {
                // admin_user
                if (rtrim($pathinfo, '/') === '/admin/user') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_user;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_user');
                    }

                    return array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::indexAction',  '_route' => 'admin_user',);
                }
                not_admin_user:

                // admin_user_create
                if (preg_match('#^/admin/user/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_user_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_create')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::createAction',));
                }
                not_admin_user_create:

                // admin_user_new
                if (preg_match('#^/admin/user/(?P<_locale>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_user_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_new')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::newAction',));
                }
                not_admin_user_new:

                // admin_user_show
                if (preg_match('#^/admin/user/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_user_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_show')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::showAction',));
                }
                not_admin_user_show:

                // admin_user_edit
                if (preg_match('#^/admin/user/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_user_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_edit')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::editAction',));
                }
                not_admin_user_edit:

                // admin_user_update
                if (preg_match('#^/admin/user/(?P<_locale>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_admin_user_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_update')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::updateAction',));
                }
                not_admin_user_update:

                // admin_user_delete
                if (preg_match('#^/admin/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_admin_user_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_delete')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::deleteAction',));
                }
                not_admin_user_delete:

                // change_password
                if (preg_match('#^/admin/user/(?P<_locale>[^/]++)/(?P<id>[^/]++)/changepassword$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'change_password')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::ChangePassword',));
                }

                if (0 === strpos($pathinfo, '/admin/userrole')) {
                    // userrole
                    if (rtrim($pathinfo, '/') === '/admin/userrole') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_userrole;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'userrole');
                        }

                        return array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::indexAction',  '_route' => 'userrole',);
                    }
                    not_userrole:

                    // userrole_create
                    if (preg_match('#^/admin/userrole/(?P<userid>[^/]++)/$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_userrole_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userrole_create')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::createAction',));
                    }
                    not_userrole_create:

                    // userrole_new
                    if (preg_match('#^/admin/userrole/(?P<_locale>[^/]++)/(?P<userid>[^/]++)/new$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_userrole_new;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userrole_new')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::newAction',));
                    }
                    not_userrole_new:

                    // userrole_show
                    if (preg_match('#^/admin/userrole/(?P<_locale>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_userrole_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userrole_show')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::showAction',));
                    }
                    not_userrole_show:

                    // userrole_edit
                    if (preg_match('#^/admin/userrole/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_userrole_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userrole_edit')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::editAction',));
                    }
                    not_userrole_edit:

                    // userrole_update
                    if (preg_match('#^/admin/userrole/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_userrole_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userrole_update')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::updateAction',));
                    }
                    not_userrole_update:

                    // userrole_delete
                    if (preg_match('#^/admin/userrole/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_userrole_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userrole_delete')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::deleteAction',));
                    }
                    not_userrole_delete:

                    // userroles
                    if (preg_match('#^/admin/userrole/(?P<_locale>[^/]++)/(?P<userid>[^/]++)/userrolelist/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'userroles');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userroles')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::userrolegridAction',));
                    }

                    // userrole_deletemodal
                    if (preg_match('#^/admin/userrole/(?P<_locale>[^/]++)/deleteuserrole/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'userrole_deletemodal')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::deletemodalAction',));
                    }

                    // Usernametwig
                    if (preg_match('#^/admin/userrole/(?P<_locale>[^/]++)/(?P<userid>[^/]++)/getusername/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'Usernametwig');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Usernametwig')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::Usernametwig',));
                    }

                    // existtroleuser
                    if (preg_match('#^/admin/userrole/(?P<_locale>[^/]++)/(?P<userid>[^/]++)/(?P<roleid>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'existtroleuser');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'existtroleuser')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserroleController::Existtroleuser',));
                    }

                }

                // users
                if ($pathinfo === '/admin/user') {
                    return array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::indexAction',  '_route' => 'users',);
                }

            }

            // roles
            if ($pathinfo === '/admin/role') {
                return array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::indexAction',  '_route' => 'roles',);
            }

        }

        // logout
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Login\\LoginBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'logout',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // userlist
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/listuser$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'userlist')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::listAction',));
            }

            // deleteuser
            if (0 === strpos($pathinfo, '/admin/deleteuser') && preg_match('#^/admin/deleteuser/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleteuser')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::deletemodalAction',));
            }

            // finduser
            if ($pathinfo === '/admin/finduser') {
                return array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::findAction',  '_route' => 'finduser',);
            }

            // userslist
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/listusers$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'userslist')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\UserController::usergridAction',));
            }

            // rolelist
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/roles$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'rolelist')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::rolegridAction',));
            }

            // deleterole
            if (0 === strpos($pathinfo, '/admin/deleterole') && preg_match('#^/admin/deleterole/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleterole')), array (  '_controller' => 'Login\\LoginBundle\\Controller\\RoleController::deletemodalAction',));
            }

            // lexik_translation_grid
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/translations/grid$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lexik_translation_grid')), array (  '_controller' => 'Lexik\\Bundle\\TranslationBundle\\Controller\\EditionController::TranslationgridAction',));
            }

            // lexik_translation_list
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/translations/list$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lexik_translation_list')), array (  '_controller' => 'Lexik\\Bundle\\TranslationBundle\\Controller\\EditionController::listAction',));
            }

            // lexik_translation_update
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/translations/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_lexik_translation_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lexik_translation_update')), array (  '_controller' => 'Lexik\\Bundle\\TranslationBundle\\Controller\\EditionController::updateAction',));
            }
            not_lexik_translation_update:

            // lexik_translation_new
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/translations/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lexik_translation_new')), array (  '_controller' => 'Lexik\\Bundle\\TranslationBundle\\Controller\\EditionController::newAction',));
            }

            // lexik_translation_invalidate_cache
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/translations/invalidate\\-cache$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lexik_translation_invalidate_cache')), array (  '_controller' => 'Lexik\\Bundle\\TranslationBundle\\Controller\\EditionController::invalidateCacheAction',));
            }

            // update_translation
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/translations/(?P<id>[^/]++)/updatetranslation$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_update_translation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_translation')), array (  '_controller' => 'Lexik\\Bundle\\TranslationBundle\\Controller\\EditionController::UpdatetranslationAction',));
            }
            not_update_translation:

            // translation_edit
            if (preg_match('#^/admin/(?P<_locale>[^/]++)/translations/(?P<id>[^/]++)/translationedit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'translation_edit')), array (  '_controller' => 'Lexik\\Bundle\\TranslationBundle\\Controller\\EditionController::EdittranslationAction',));
            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
