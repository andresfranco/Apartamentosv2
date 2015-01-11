<?php

namespace Proxies\__CG__\Login\LoginBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \Login\LoginBundle\Entity\User implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'username', 'password', 'salt', 'companyid', 'name', 'email', 'user_roles', 'createdate', 'createuser', 'modifydate', 'modifyuser');
        }

        return array('__isInitialized__', 'id', 'username', 'password', 'salt', 'companyid', 'name', 'email', 'user_roles', 'createdate', 'createuser', 'modifydate', 'modifyuser');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername($username)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsername', array($username));

        return parent::setUsername($username);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', array());

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', array($password));

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', array());

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setSalt($salt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSalt', array($salt));

        return parent::setSalt($salt);
    }

    /**
     * {@inheritDoc}
     */
    public function getSalt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSalt', array());

        return parent::getSalt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyid(\Apartamentos\ApartamentosBundle\Entity\Company $companyid = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyid', array($companyid));

        return parent::setCompanyid($companyid);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyid', array());

        return parent::getCompanyid();
    }

    /**
     * {@inheritDoc}
     */
    public function addRole(\Login\LoginBundle\Entity\Role $userRoles)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRole', array($userRoles));

        return parent::addRole($userRoles);
    }

    /**
     * {@inheritDoc}
     */
    public function setUserRoles($roles)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserRoles', array($roles));

        return parent::setUserRoles($roles);
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function getUserRoles()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserRoles', array());

        return parent::getUserRoles();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoles', array());

        return parent::getRoles();
    }

    /**
     * {@inheritDoc}
     */
    public function equals(\Symfony\Component\Security\Core\User\UserInterface $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'equals', array($user));

        return parent::equals($user);
    }

    /**
     * {@inheritDoc}
     */
    public function eraseCredentials()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'eraseCredentials', array());

        return parent::eraseCredentials();
    }

    /**
     * {@inheritDoc}
     */
    public function addUserRole(\Login\LoginBundle\Entity\Role $userRoles)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUserRole', array($userRoles));

        return parent::addUserRole($userRoles);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUserRole(\Login\LoginBundle\Entity\Role $userRoles)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUserRole', array($userRoles));

        return parent::removeUserRole($userRoles);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRole(\Login\LoginBundle\Entity\Role $userRoles)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRole', array($userRoles));

        return parent::removeRole($userRoles);
    }

    /**
     * {@inheritDoc}
     */
    public function serialize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'serialize', array());

        return parent::serialize();
    }

    /**
     * {@inheritDoc}
     */
    public function unserialize($serialized)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'unserialize', array($serialized));

        return parent::unserialize($serialized);
    }

    /**
     * {@inheritDoc}
     */
    public function hasRole($role)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasRole', array($role));

        return parent::hasRole($role);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedate($createdate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedate', array($createdate));

        return parent::setCreatedate($createdate);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedate', array());

        return parent::getCreatedate();
    }

    /**
     * {@inheritDoc}
     */
    public function setModifydate($modifydate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModifydate', array($modifydate));

        return parent::setModifydate($modifydate);
    }

    /**
     * {@inheritDoc}
     */
    public function getModifydate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModifydate', array());

        return parent::getModifydate();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreateuser($createuser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreateuser', array($createuser));

        return parent::setCreateuser($createuser);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreateuser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreateuser', array());

        return parent::getCreateuser();
    }

    /**
     * {@inheritDoc}
     */
    public function setModifyuser($modifyuser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModifyuser', array($modifyuser));

        return parent::setModifyuser($modifyuser);
    }

    /**
     * {@inheritDoc}
     */
    public function getModifyuser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModifyuser', array());

        return parent::getModifyuser();
    }

}
