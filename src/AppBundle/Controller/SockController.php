<?php

namespace AppBundle\Controller;

use Doctrine\Common\Persistence\Mapping\Driver\SymfonyFileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Sock;
use AppBundle\Form\SockType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Sock controller.
 *
 * @Route("/sock")
 */
class SockController extends Controller
{
    /**
     * Lists all Sock entities.
     *
     * @Route("/", name="sock_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $socks = $em->getRepository('AppBundle:Sock')->findAll();

        return $this->render('sock/index.html.twig', array(
            'socks' => $socks,
        ));
    }

    /**
     * Lists all Sock entities.
     *
     * @Route("/backoffice", name="sock_backoffice")
     * @Method("GET")
     */
    public function boAction()
    {
        $em = $this->getDoctrine()->getManager();

        $socks = $em->getRepository('AppBundle:Sock')->findAll();

        return $this->render('sock/backoffice.html.twig', array(
            'socks' => $socks,
        ));
    }

    /**
     * Creates a new Sock entity.
     *
     * @Route("/backoffice/new", name="sock_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sock = new Sock();
        $form = $this->createForm('AppBundle\Form\SockType', $sock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $sock->getImgUrl();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('photos_directory'),
                $fileName
            );
            $sock->setImgUrl($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($sock);
            $em->flush();

            return $this->redirectToRoute('sock_show', array('id' => $sock->getId()));
        }

        return $this->render('sock/new.html.twig', array(
            'sock' => $sock,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sock entity.
     *
     * @Route("/{id}", name="sock_show")
     * @Method("GET")
     */
    public function showAction(Sock $sock)
    {
        $deleteForm = $this->createDeleteForm($sock);

        return $this->render('sock/show.html.twig', array(
            'sock' => $sock,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Sock entity.
     *
     * @Route("/{id}/edit", name="sock_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sock $sock)
    {
        $deleteForm = $this->createDeleteForm($sock);
        $editForm = $this->createForm('AppBundle\Form\SockType', $sock);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sock);
            $em->flush();

            return $this->redirectToRoute('sock_edit', array('id' => $sock->getId()));
        }

        return $this->render('sock/edit.html.twig', array(
            'sock' => $sock,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sock entity.
     *
     * @Route("/{id}", name="sock_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sock $sock)
    {
        $form = $this->createDeleteForm($sock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sock);
            $em->flush();
        }

        return $this->redirectToRoute('sock_index');
    }

    /**
     * Creates a form to delete a Sock entity.
     *
     * @param Sock $sock The Sock entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sock $sock)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sock_delete', array('id' => $sock->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
