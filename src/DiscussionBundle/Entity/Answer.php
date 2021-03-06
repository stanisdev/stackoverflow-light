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
     * @ORM\OneToOne(targetEntity="BestAnswer", mappedBy="answer")
     */
    private $bestAnswer;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="answer")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="answer")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $question;

    /**
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="answer")
     */
    private $usersChangedRating;

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
     * Set content
     *
     * @param string $content
     *
     * @return Answer
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
     * Set uid
     *
     * @param integer $uid
     *
     * @return Answer
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Answer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set bestAnswer
     *
     * @param \DiscussionBundle\Entity\BestAnswer $bestAnswer
     *
     * @return Answer
     */
    public function setBestAnswer(\DiscussionBundle\Entity\BestAnswer $bestAnswer = null)
    {
        $this->bestAnswer = $bestAnswer;

        return $this;
    }

    /**
     * Get bestAnswer
     *
     * @return \DiscussionBundle\Entity\BestAnswer
     */
    public function getBestAnswer()
    {
        return $this->bestAnswer;
    }

    /**
     * Set user
     *
     * @param \DiscussionBundle\Entity\User $user
     *
     * @return Answer
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comment
     *
     * @param \DiscussionBundle\Entity\Comment $comment
     *
     * @return Answer
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

    /**
     * Set question
     *
     * @param \DiscussionBundle\Entity\Question $question
     *
     * @return Answer
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
     * Add usersChangedRating
     *
     * @param \DiscussionBundle\Entity\Rating $usersChangedRating
     *
     * @return Answer
     */
    public function addUsersChangedRating(\DiscussionBundle\Entity\Rating $usersChangedRating)
    {
        $this->usersChangedRating[] = $usersChangedRating;

        return $this;
    }

    /**
     * Remove usersChangedRating
     *
     * @param \DiscussionBundle\Entity\Rating $usersChangedRating
     */
    public function removeUsersChangedRating(\DiscussionBundle\Entity\Rating $usersChangedRating)
    {
        $this->usersChangedRating->removeElement($usersChangedRating);
    }

    /**
     * Get usersChangedRating
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersChangedRating()
    {
        return $this->usersChangedRating;
    }
}
