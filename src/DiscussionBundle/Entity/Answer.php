<?php

namespace DiscussionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer")
 * @ORM\Entity(repositoryClass="DiscussionBundle\Repository\AnswerRepository")
 */
class Answer
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
     * @ORM\Column(name="content", type="text", columnDefinition="TEXT NOT NULL")
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="uid", type="integer", unique=true, options={"unsigned":true})
     */
    private $uid;

    /**
     * @var datetime
     *
     * @ORM\Column(name="created_at", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $createdAt;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
