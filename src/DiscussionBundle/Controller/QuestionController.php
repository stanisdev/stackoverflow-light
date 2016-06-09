<?php

namespace DiscussionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class QuestionController extends Controller
{
    /**
     * @Route("/question/ask", name="ask_question")
     */
    public function askAction() {
        return $this->render('question/ask.html.twig', []);
    }
}
