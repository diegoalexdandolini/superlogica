<?php

namespace App\Controller;

use App\Entity\UserForm;
use App\Form\UserFormType;
use App\Repository\UserFormRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/user/form")
 */
class UserFormController extends AbstractController
{
    /**
     * @Route("/", name="user_form_index", methods={"GET"})
     */
    public function index(UserFormRepository $userFormRepository): Response
    {
        return $this->render('user_form/index.html.twig', [
            'user_forms' => $userFormRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_form_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userForm = new UserForm();
        $form = $this->createForm(UserFormType::class, $userForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($userForm);
            $entityManager->flush();

            return $this->redirectToRoute('user_form_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_form/new.html.twig', [
            'user_form' => $userForm,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_form_show", methods={"GET"})
     */
    public function show(UserForm $userForm): Response
    {
        return $this->render('user_form/show.html.twig', [
            'user_form' => $userForm,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_form_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, UserForm $userForm, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserFormType::class, $userForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('user_form_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_form/edit.html.twig', [
            'user_form' => $userForm,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_form_delete", methods={"POST"})
     */
    public function delete(Request $request, UserForm $userForm, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userForm->getId(), $request->request->get('_token'))) {
            $entityManager->remove($userForm);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_form_index', [], Response::HTTP_SEE_OTHER);
    }
}
