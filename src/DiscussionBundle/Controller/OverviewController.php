<?php

namespace DiscussionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DiscussionBundle\Entity\Question;
use DiscussionBundle\Entity\Answer;
use DiscussionBundle\Entity\Tag;

class OverviewController extends Controller
{
    /**
     * @Route("/questions", name="questions")
     */
    public function questionsAction()
    {
        $questions = $this->getDoctrine()->getRepository('DiscussionBundle:Question')->findAllQuestions();
        //echo '<pre>'; print_r($questions); echo '</pre>';
        return $this->render('overview/questions.html.twig', ['questions' => $questions]);
    }

    /**
     * @Route("/tags", name="tags")
     */
    public function tagsAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
        }
        return $this->render('overview/tags.html.twig', []);
    }
}
