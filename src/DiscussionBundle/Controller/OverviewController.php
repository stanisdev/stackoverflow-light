<?php

namespace DiscussionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OverviewController extends Controller
{
    /**
     * @Route("/questions", name="questions")
     */
    public function questionsAction()
    {
        return $this->render('overview/questions.html.twig', []);
    }

    /**
     * @Route("/tags", name="tags")
     */
    public function tagsAction()
    {
        return $this->render('overview/tags.html.twig', []);
    }

}
