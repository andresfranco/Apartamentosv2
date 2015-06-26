<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usercomment
 *
 * @ORM\Table(name="usercomment", indexes={@ORM\Index(name="fk_usercomment_admin_user1_idx", columns={"userid"}), @ORM\Index(name="fk_usercomment_post1_idx", columns={"postid"})})
 * @ORM\Entity
 */
class Usercomment
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
     * @ORM\Column(name="content", type="text", length=255, nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commentdate", type="datetime", nullable=true)
     */
    private $commentdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=false)
     */
    private $createdate;

    /**
     * @var string
     *
     * @ORM\Column(name="createuser", type="string", length=45, nullable=false)
     */
    private $createuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=false)
     */
    private $modifydate;

    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=false)
     */
    private $modifyuser;

    /**
     * @var \AdminUser
     *
     * @ORM\ManyToOne(targetEntity="AdminUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \Post
     *
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="postid", referencedColumnName="id")
     * })
     */
    private $postid;



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
     * Set content
     *
     * @param string $content
     * @return Usercomment
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Usercomment
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set commentdate
     *
     * @param \DateTime $commentdate
     * @return Usercomment
     */
    public function setCommentdate($commentdate)
    {
        $this->commentdate = $commentdate;
    
        return $this;
    }

    /**
     * Get commentdate
     *
     * @return \DateTime 
     */
    public function getCommentdate()
    {
        return $this->commentdate;
    }

    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Usercomment
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
     * Set createuser
     *
     * @param string $createuser
     * @return Usercomment
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
     * Set modifydate
     *
     * @param \DateTime $modifydate
     * @return Usercomment
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
     * Set modifyuser
     *
     * @param string $modifyuser
     * @return Usercomment
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

    /**
     * Set userid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\AdminUser $userid
     * @return Usercomment
     */
    public function setUserid(\Apartamentos\ApartamentosBundle\Entity\AdminUser $userid = null)
    {
        $this->userid = $userid;
    
        return $this;
    }

    /**
     * Get userid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\AdminUser 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set postid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Post $postid
     * @return Usercomment
     */
    public function setPostid(\Apartamentos\ApartamentosBundle\Entity\Post $postid = null)
    {
        $this->postid = $postid;
    
        return $this;
    }

    /**
     * Get postid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Post 
     */
    public function getPostid()
    {
        return $this->postid;
    }
}
