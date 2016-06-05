<?php

namespace DiscussionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BestAnswer
 *
 * @ORM\Table(name="best_answer")
 * @ORM\Entity(repositoryClass="DiscussionBundle\Repository\BestAnswerRepository")
 */
class BestAnswer
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

