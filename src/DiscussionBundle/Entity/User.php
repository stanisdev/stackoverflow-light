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

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="user")
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="user")
     */
    private $answers;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity="Question", mappedBy="usersSavedQuestionAsFavorite")
     */
    private $questionsSavedAsFavorite;

    public function __construct()
    {
        parent::__construct();
        $this->viewedQuestions = new ArrayCollection();
        $this->questionsChangedRating = new ArrayCollection();
        $this->questions = new ArrayCollection();
        $this->answers = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->questionsSavedAsFavorite = new ArrayCollection();
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

    /**
     * Add question
     *
     * @param \DiscussionBundle\Entity\Question $question
     *
     * @return User
     */
    public function addQuestion(\DiscussionBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \DiscussionBundle\Entity\Question $question
     */
    public function removeQuestion(\DiscussionBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add answer
     *
     * @param \DiscussionBundle\Entity\Answer $answer
     *
     * @return User
     */
    public function addAnswer(\DiscussionBundle\Entity\Answer $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \DiscussionBundle\Entity\Answer $answer
     */
    public function removeAnswer(\DiscussionBundle\Entity\Answer $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Add questionsSavedAsFavorite
     *
     * @param \DiscussionBundle\Entity\Question $questionsSavedAsFavorite
     *
     * @return User
     */
    public function addQuestionsSavedAsFavorite(\DiscussionBundle\Entity\Question $questionsSavedAsFavorite)
    {
        $this->questionsSavedAsFavorite[] = $questionsSavedAsFavorite;

        return $this;
    }

    /**
     * Remove questionsSavedAsFavorite
     *
     * @param \DiscussionBundle\Entity\Question $questionsSavedAsFavorite
     */
    public function removeQuestionsSavedAsFavorite(\DiscussionBundle\Entity\Question $questionsSavedAsFavorite)
    {
        $this->questionsSavedAsFavorite->removeElement($questionsSavedAsFavorite);
    }

    /**
     * Get questionsSavedAsFavorite
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionsSavedAsFavorite()
    {
        return $this->questionsSavedAsFavorite;
    }

    /**
     * Add comment
     *
     * @param \DiscussionBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\DiscussionBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \DiscussionBundle\Entity\Comment $comment
     */
    public function removeComment(\DiscussionBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
