<?php

namespace DiscussionBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Question", mappedBy="viewedByUsers")
     */
    private $viewedQuestions;

    /**
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="users")
     */
    private $questionsChangedRating;

    public function __construct()
    {
        parent::__construct();
        $this->viewedQuestions = new ArrayCollection();
        $this->questionsChangedRating = new ArrayCollection();
    }

    /**
     * Add viewedQuestion
     *
     * @param \DiscussionBundle\Entity\Question $viewedQuestion
     *
     * @return User
     */
    public function addViewedQuestion(\DiscussionBundle\Entity\Question $viewedQuestion)
    {
        $this->viewedQuestions[] = $viewedQuestion;

        return $this;
    }

    /**
     * Remove viewedQuestion
     *
     * @param \DiscussionBundle\Entity\Question $viewedQuestion
     */
    public function removeViewedQuestion(\DiscussionBundle\Entity\Question $viewedQuestion)
    {
        $this->viewedQuestions->removeElement($viewedQuestion);
    }

    /**
     * Get viewedQuestions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getViewedQuestions()
    {
        return $this->viewedQuestions;
    }

    /**
     * Add questionsChangedRating
     *
     * @param \DiscussionBundle\Entity\Rating $questionsChangedRating
     *
     * @return User
     */
    public function addQuestionsChangedRating(\DiscussionBundle\Entity\Rating $questionsChangedRating)
    {
        $this->questionsChangedRating[] = $questionsChangedRating;

        return $this;
    }

    /**
     * Remove questionsChangedRating
     *
     * @param \DiscussionBundle\Entity\Rating $questionsChangedRating
     */
    public function removeQuestionsChangedRating(\DiscussionBundle\Entity\Rating $questionsChangedRating)
    {
        $this->questionsChangedRating->removeElement($questionsChangedRating);
    }

    /**
     * Get questionsChangedRating
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionsChangedRating()
    {
        return $this->questionsChangedRating;
    }
}
