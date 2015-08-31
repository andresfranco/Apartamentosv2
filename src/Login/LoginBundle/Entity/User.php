<?php

namespace Login\LoginBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;

/**
  * @ORM\Entity
  * @ORM\Table(name="admin_user")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @GRID\Column(filterable=false)
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=32)
    * @GRID\Column(title="Usuario")
    */
    protected $username;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     * @GRID\Column(filterable=false)
     */
    protected $password;

    /**
     * @ORM\Column(name="salt", type="string", length=255)
     * @GRID\Column(filterable=false)
     */
    protected $salt;
      
     /**
     * @ORM\ManyToOne(targetEntity="\Apartamentos\ApartamentosBundle\Entity\Company")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="Companyid", referencedColumnName="id")
     * })
     * @GRID\Column(field="companyid.name", title="Condominio")
     */
    private $companyid;
     /**
    * @ORM\Column(type="string", length=45)
    * @GRID\Column(title="name.filter")
    */
    private $name;
     /**
    * @ORM\Column(type="string", length=60)
    * @GRID\Column(title="Email")
    */
    private $email;
    /**
     * se utilizó user_roles para no hacer conflicto al aplicar ->toArray en getRoles()
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="userrole",
     *     joinColumns={@ORM\JoinColumn(name="userid", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="roleid", referencedColumnName="id")}
     * )
     */
    
   
    protected $user_roles;
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

   
    
    public function __construct()
    {
        $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }
      /**
     * Set companyid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Company $companyid
     * @return AdminUser
     */
    public function setCompanyid(\Apartamentos\ApartamentosBundle\Entity\Company $companyid = null)
    {
        $this->companyid = $companyid;

        return $this;
    }

    /**
     * Get companyid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Company 
     */
    public function getCompanyid()
    {
        return $this->companyid;
    }
    
    /**
     * Add user_roles
     *
     * @param Login\LoginBundle\Entity\Role $userRoles
     */
    public function addRole(\Login\LoginBundle\Entity\Role $userRoles)
    {
        $this->user_roles[] = $userRoles;
    }

    public function setUserRoles($roles) {
        $this->user_roles = $roles;
    }
     /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Get user_roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserRoles()
    {
        return $this->user_roles;
    }

    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->user_roles->toArray(); //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }
  
    /*---query que obtiene los roles por usuario
     SELECT * FROM `user_role` ur
inner join adminroles ar on ar.id=ur.role_id
where ur.user_id=1
    */
    /**
     * Compares this user to another to determine if they are the same.
     *
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user) {
        return md5($this->getUsername()) == md5($user->getUsername());

    }

    /**
     * Erases the user credentials.
     */
    public function eraseCredentials() {

    }

    /**
     * Add user_roles
     *
     * @param \Login\LoginBundle\Entity\Role $userRoles
     * @return User
     */
    public function addUserRole(\Login\LoginBundle\Entity\Role $userRoles)
    {
        $this->user_roles[] = $userRoles;

        return $this;
    }
    

    /**
     * Remove user_roles
     *
     * @param \Login\LoginBundle\Entity\Role $userRoles
     */
    public function removeUserRole(\Login\LoginBundle\Entity\Role $userRoles)
    {
        $this->user_roles->removeElement($userRoles);
    }
    
    public function removeRole(\Login\LoginBundle\Entity\Role $userRoles)
    {
        $this->user_roles->removeElement($userRoles);
    }
    
    
    public function serialize()
{
    return \json_encode(
            array($this->username, $this->password, $this->salt,
                    $this->user_roles, $this->id));
}

/**
 * Unserializes the given string in the current User object
 * @param serialized
 */
public function unserialize($serialized)
{
    list($this->username, $this->password, $this->salt,
                    $this->user_roles, $this->id) = \json_decode(
            $serialized);
}
public function hasRole($role) {
    if(in_array($role, $this->getRoles())) return true;
    return false;
}

 /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
