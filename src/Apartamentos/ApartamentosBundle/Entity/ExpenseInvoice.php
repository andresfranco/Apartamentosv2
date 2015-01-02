<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * ExpenseInvoice
 *
 * @ORM\Table(name="expenseinvoice", indexes={@ORM\Index(name="fk_expense_invoice_expense1_idx", columns={"expenseid"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ExpenseInvoice
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    protected $path;

    /**
     * @var \Expense
     *
     * @ORM\ManyToOne(targetEntity="Expense")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expenseid", referencedColumnName="id")
     * })
     */
    private $expenseid;
    /**
     * Image file
     *
     * @var File
     * @Assert\File(
     *     maxSize = "8M",
     *     maxSizeMessage = "The maxmimum allowed file size is 8MB."
     * )
     */
    protected $file;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=false)
     * @GRID\Column(title="Create Date",filterable=false)
     */
    private $createdate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="createuser", type="string", length=45, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $createuser;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=false)
     * @GRID\Column(title="Modify Date",filterable=false)
     */
    private $modifydate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $modifyuser;
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ExpenseInvoice
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ExpenseInvoice
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return ExpenseInvoice
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set expenseid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Expense $expenseid
     * @return ExpenseInvoice
     */
    public function setExpenseid(\Apartamentos\ApartamentosBundle\Entity\Expense $expenseid = null)
    {
        $this->expenseid = $expenseid;

        return $this;
    }

    /**
     * Get expenseid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Expense 
     */
    public function getExpenseid()
    {
        return $this->expenseid;
    }
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // la ruta absoluta del directorio donde se deben
        // guardar los archivos cargados
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // se deshace del __DIR__ para no meter la pata
        // al mostrar el documento/imagen cargada en la vista.
        return 'documents/expenses';
    }
    
    /**
 * Called before saving the entity
 * 
 * @ORM\PrePersist()
 * @ORM\PreUpdate()
 */
public function preUpload()
{   
    if (null !== $this->file) {
        // do whatever you want to generate a unique name
        $filename =$this->getName(); //sha1(uniqid(mt_rand(), true));
        $this->path = $filename.'.'.$this->file->guessExtension();
    }
}

/**
 * Called before entity removal
 *
 * @ORM\PreRemove()
 */
public function removeUpload()
{
    if ($file = $this->getAbsolutePath()) {
        unlink($file); 
    }
}
/**
 * Called after entity persistence
 *
 * @ORM\PostPersist()
 * @ORM\PostUpdate()
 */
public function upload()
{
    // The file property can be empty if the field is not required
    if (null === $this->file) {
        return;
    }

    // Use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
    $this->file->move(
        $this->getUploadRootDir(),
        $this->path
    );

    // Set the path property to the filename where you've saved the file
    //$this->path = $this->file->getClientOriginalName();

    // Clean up the file property as you won't need it anymore
    $this->file = null;
}
 /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return ExpenseInvoice
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;

        return $this;
    }

    /**
     * Get createdate
     *
     * @return \DateTime 
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }
    
    /**
     * Set modifydate
     *
     * @param \DateTime $modifydate
     * @return ExpenseInvoice
     */
    public function setModifydate($modifydate)
    {
        $this->modifydate = $modifydate;

        return $this;
    }

    /**
     * Get modifydate
     *
     * @return \DateTime 
     */
    public function getModifydate()
    {
        return $this->modifydate;
    }
    
    /**
     * Set createuser
     *
     * @param string $createuser
     * @return ExpenseInvoice
     */
    public function setCreateuser($createuser)
    {
        $this->createuser = $createuser;

        return $this;
    }

    /**
     * Get createuser
     *
     * @return string 
     */
    public function getCreateuser()
    {
        return $this->createuser;
    }
    /**
     * Set modifyuser
     *
     * @param string $modifyuser
     * @return ExpenseInvoice
     */
    public function setModifyuser($modifyuser)
    {
        $this->modifyuser = $modifyuser;

        return $this;
    }

    /**
     * Get modifyuser
     *
     * @return string 
     */
    public function getModifyuser()
    {
        return $this->modifyuser;
    }
}
