<?php

namespace DiscussionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity(repositoryClass="DiscussionBundle\Repository\RatingRepository")
 */
class Rating
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
     * @var bool
     *
     * @ORM\Column(name="estimate", type="boolean")
     */
    private $estimate;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="usersChangedRating")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="questionsChangedRating")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set estimate
     *
     * @param boolean $estimate
     *
     * @return Rating
     */
    public function setEstimate($estimate)
    {
        $this->estimate = $estimate;

        return $this;
    }

    /**
     * Get estimate
     *
     * @return bool
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Set question
     *
     * @param \DiscussionBundle\Entity\Question $question
     *
     * @return Rating
     */
    public function setQuestion(\DiscussionBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \DiscussionBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set user
     *
     * @param \DiscussionBundle\Entity\User $user
     *
     * @return Rating
     */
    public function setUser(\DiscussionBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \DiscussionBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
