<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityUser
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class EntityUser
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


}
