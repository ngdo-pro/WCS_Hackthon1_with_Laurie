<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sock
 *
 * @ORM\Table(name="sock")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SockRepository")
 */
class Sock
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="imgUrl", type="string", length=255)
     */
    private $imgUrl;

    /**
     * @var bool
     *
     * @ORM\Column(name="hasVoted", type="boolean")
     */
    private $hasVoted;

    /**
     * @var int
     *
     * @ORM\Column(name="sockVoteCount", type="integer")
     */
    private $sockVoteCount;

    /**
     * @var int
     *
     * @ORM\Column(name="personVoteCount", type="integer")
     */
    private $personVoteCount;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


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
     * Set firstName
     *
     * @param string $firstName
     * @return Sock
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Sock
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     * @return Sock
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string 
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * Set hasVoted
     *
     * @param boolean $hasVoted
     * @return Sock
     */
    public function setHasVoted($hasVoted)
    {
        $this->hasVoted = $hasVoted;

        return $this;
    }

    /**
     * Get hasVoted
     *
     * @return boolean 
     */
    public function getHasVoted()
    {
        return $this->hasVoted;
    }

    /**
     * Set sockVoteCount
     *
     * @param integer $sockVoteCount
     * @return Sock
     */
    public function setSockVoteCount($sockVoteCount)
    {
        $this->sockVoteCount = $sockVoteCount;

        return $this;
    }

    /**
     * Get sockVoteCount
     *
     * @return integer 
     */
    public function getSockVoteCount()
    {
        return $this->sockVoteCount;
    }

    /**
     * Set personVoteCount
     *
     * @param integer $personVoteCount
     * @return Sock
     */
    public function setPersonVoteCount($personVoteCount)
    {
        $this->personVoteCount = $personVoteCount;

        return $this;
    }

    /**
     * Get personVoteCount
     *
     * @return integer 
     */
    public function getPersonVoteCount()
    {
        return $this->personVoteCount;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Sock
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
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
}
