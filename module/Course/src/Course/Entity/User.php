<?php

namespace Course\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=400, nullable=true)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="secret_question", type="text", nullable=true)
     */
    private $secretQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="secret_answer", type="text", nullable=true)
     */
    private $secretAnswer;



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
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set userName
     *
     * @param string $userName
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
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
     * Set secretQuestion
     *
     * @param string $secretQuestion
     * @return User
     */
    public function setSecretQuestion($secretQuestion)
    {
        $this->secretQuestion = $secretQuestion;

        return $this;
    }

    /**
     * Get secretQuestion
     *
     * @return string 
     */
    public function getSecretQuestion()
    {
        return $this->secretQuestion;
    }

    /**
     * Set secretAnswer
     *
     * @param string $secretAnswer
     * @return User
     */
    public function setSecretAnswer($secretAnswer)
    {
        $this->secretAnswer = $secretAnswer;

        return $this;
    }

    /**
     * Get secretAnswer
     *
     * @return string 
     */
    public function getSecretAnswer()
    {
        return $this->secretAnswer;
    }
}
