<?php

namespace DiscussionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DiscussionBundle\Entity\Question;
use DiscussionBundle\Entity\Tag;

class OverviewController extends Controller
{
    /**
     * @Route("/questions", name="questions")
     */
    public function questionsAction()
    {
        // $tag = $this->getDoctrine()->getRepository('DiscussionBundle:Tag')->findOneById(1);
        // $tag2 = $this->getDoctrine()->getRepository('DiscussionBundle:Tag')->findOneById(2);
        //
        // $question = new Question();
        // $question->setTitle('how to node?');
        // $question->setContent('Reference to book');
        // $question->setUid(253673);
        // $question->addTag( $tag );
        // $question->addTag( $tag2 );
        //
        //
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($question);
        // $em->flush();

        // $q = $this->getDoctrine()->getRepository('DiscussionBundle:Question')->findOneById(1);
        // foreach ($q->getTags() as $index => $tag) {
        //     echo $tag->getId();
        // }

        return $this->render('overview/questions.html.twig', []);
    }

    /**
     * @Route("/tags", name="tags")
     */
    public function tagsAction()
    {
        // $tag = new Tag();
        // $tag->setName('mongoDB');
        //
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($tag);
        // $em->flush();

        return $this->render('overview/tags.html.twig', []);
    }

}
