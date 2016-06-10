<?php

namespace DiscussionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use DiscussionBundle\Entity\Question;

/**
 * @Route("/question")
 */
class QuestionController extends Controller
{
    /**
     * @Route("/ask", name="ask_question")
     * @Security(isGranted="IS_AUTHENTICATED_FULLY")
     */
    public function askAction() {

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
        }
        return $this->render('question/ask.html.twig', []);
    }
}
