<?php
namespace DiscussionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DiscussionBundle\Entity\Question;
use DiscussionBundle\Form\QuestionType;

/**
 * @Route("/question")
 */
class QuestionController extends Controller
{
    /**
     * Finds and displays a Question entity and bound entities.
     *
     * @Route("/{id}", name="question_show", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function showAction($id)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $userId = $this->getUser()->getId();
        }

        // Get question information
        $question = $this->getDoctrine()->getRepository('DiscussionBundle:Question')->findOneQuestionById($id, $userId ?? 0);
        if (empty($question)) {
            throw $this->createNotFoundException('The question does not exist');
        }

        // Find comments
        $comments = $this->getDoctrine()->getRepository('DiscussionBundle:Comment')->findCommentsByQuestionId($id);

        return $this->render('question/show.html.twig', array(
            'question' => $question,
            'comments' => $comments
        ));
    }

    /**
     * Creates a new Question entity.
     *
     * @Route("/new", name="question_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $question = new Question();
        $form = $this->createForm('DiscussionBundle\Form\QuestionType', $question);
        $form->handleRequest($request);

        // Save question
        if ($form->isSubmitted() && $form->isValid()) {
            $question->setUser($this->getUser());
            $question->setUid($this->get('tools')->getUid());

            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('question_show', array('id' => $question->getId()));
        }

        return $this->render('question/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing Question entity.
     *
     * @Route("/{id}/edit", name="question_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Question $question)
    {
        $deleteForm = $this->createDeleteForm($question);
        $editForm = $this->createForm('DiscussionBundle\Form\QuestionType', $question);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('question_edit', array('id' => $question->getId()));
        }

        return $this->render('question/edit.html.twig', array(
            'question' => $question,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Question entity.
     *
     * @Route("/{id}", name="question_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Question $question)
    {
        $form = $this->createDeleteForm($question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($question);
            $em->flush();
        }

        return $this->redirectToRoute('question_index');
    }

    /**
     * Creates a form to delete a Question entity.
     *
     * @param Question $question The Question entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Question $question)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('question_delete', array('id' => $question->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
