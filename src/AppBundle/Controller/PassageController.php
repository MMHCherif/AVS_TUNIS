<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Passage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Passage controller.
 *
 * @Route("passage")
 */
class PassageController extends Controller
{
    /**
     * Lists all passage entities.
     *
     * @Route("/", name="passage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passages = $em->getRepository('AppBundle:Passage')->findAll();

        return $this->render('passage/index.html.twig', array(
            'passages' => $passages,
        ));
    }

    /**
     * Creates a new passage entity.
     *
     * @Route("/new", name="passage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $passage = new Passage();
        $form = $this->createForm('AppBundle\Form\PassageType', $passage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($passage);
            $em->flush();

            return $this->redirectToRoute('passage_show', array('id' => $passage->getId()));
        }

        return $this->render('passage/new.html.twig', array(
            'passage' => $passage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a passage entity.
     *
     * @Route("/{id}", name="passage_show")
     * @Method("GET")
     */
    public function showAction(Passage $passage)
    {
        $deleteForm = $this->createDeleteForm($passage);

        return $this->render('passage/show.html.twig', array(
            'passage' => $passage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing passage entity.
     *
     * @Route("/{id}/edit", name="passage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Passage $passage)
    {
        $deleteForm = $this->createDeleteForm($passage);
        $editForm = $this->createForm('AppBundle\Form\PassageType', $passage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('passage_edit', array('id' => $passage->getId()));
        }

        return $this->render('passage/edit.html.twig', array(
            'passage' => $passage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a passage entity.
     *
     * @Route("/{id}", name="passage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Passage $passage)
    {
        $form = $this->createDeleteForm($passage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($passage);
            $em->flush();
        }

        return $this->redirectToRoute('passage_index');
    }

    /**
     * Creates a form to delete a passage entity.
     *
     * @param Passage $passage The passage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Passage $passage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('passage_delete', array('id' => $passage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
