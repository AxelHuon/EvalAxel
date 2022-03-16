<?php

namespace App\Controller;

use App\Entity\Mediations;
use App\Form\MediationEditType;
use App\Repository\MediationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MediationController extends AbstractController
{
    #[Route('/mediation{id}', name: 'app_mediation')]
    public function index($id, Mediations $mediations): Response
    {

        if ($this->getUser()) {

            return $this->render('mediation/index.html.twig', [
                "mediation" => $mediations,
                "user" => $this->getUser()
            ]);
        }else{
            return $this->redirectToRoute('app_login');
        }
    }




    #[Route('/mediation/edit{id}', name: 'app_mediation_edit')]
    public function editOffre($id, EntityManagerInterface $entityManager, MediationsRepository $mediationsRepository, \Symfony\Component\HttpFoundation\Request $request): Response
    {
        if ($this->getUser()) {

            $mediations = $mediationsRepository->find($id);

            $form = $this->createForm(MediationEditType::class, $mediations);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->persist($mediations);
                $entityManager->flush();
                return $this->redirectToRoute('app_mediation', [
                    'id' => $id
                ]);
            }

            return $this->renderForm('mediation/form.html.twig', [
                'user' => $this->getUser(),
                'form' => $form,
            ]);
        }else{
            $this->redirectToRoute('app_login');
        }
    }
}
