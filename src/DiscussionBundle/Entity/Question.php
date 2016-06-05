<?php

namespace DiscussionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="DiscussionBundle\Repository\QuestionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Question
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

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
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="questions")
     * @ORM\JoinTable(name="questions_tags")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="viewedQuestions")
     * @ORM\JoinTable(name="viewed_questions_by_users")
     */
    private $viewedByUsers;

    /**
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="question")
     */
    private $usersChangedRating;

    /**
     * Constructor method
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->viewedByUsers = new ArrayCollection();
        $this->usersChangedRating = new ArrayCollection();
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Question
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Question
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
     * @return Question
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return int
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
     * @return Question
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
     * Add tag
     *
     * @param \DiscussionBundle\Entity\Tag $tag
     *
     * @return Question
     */
    public function addTag(\DiscussionBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \DiscussionBundle\Entity\Tag $tag
     */
    public function removeTag(\DiscussionBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add viewedByUser
     *
     * @param \DiscussionBundle\Entity\User $viewedByUser
     *
     * @return Question
     */
    public function addViewedByUser(\DiscussionBundle\Entity\User $viewedByUser)
    {
        $this->viewedByUsers[] = $viewedByUser;

        return $this;
    }

    /**
     * Remove viewedByUser
     *
     * @param \DiscussionBundle\Entity\User $viewedByUser
     */
    public function removeViewedByUser(\DiscussionBundle\Entity\User $viewedByUser)
    {
        $this->viewedByUsers->removeElement($viewedByUser);
    }

    /**
     * Get viewedByUsers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getViewedByUsers()
    {
        return $this->viewedByUsers;
    }

    /**
     * Add usersChangedRating
     *
     * @param \DiscussionBundle\Entity\Rating $usersChangedRating
     *
     * @return Question
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
