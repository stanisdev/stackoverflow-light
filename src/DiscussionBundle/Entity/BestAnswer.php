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
     * @ORM\OneToOne(targetEntity="Answer", inversedBy="bestAnswer")
     * @ORM\JoinColumn(name="answer_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $answer;

    /**
     * @ORM\OneToOne(targetEntity="Question", inversedBy="bestAnswer")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $question;

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
     * Set answer
     *
     * @param \DiscussionBundle\Entity\Answer $answer
     *
     * @return BestAnswer
     */
    public function setAnswer(\DiscussionBundle\Entity\Answer $answer = null)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return \DiscussionBundle\Entity\Answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set question
     *
     * @param \DiscussionBundle\Entity\Question $question
     *
     * @return BestAnswer
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
}
