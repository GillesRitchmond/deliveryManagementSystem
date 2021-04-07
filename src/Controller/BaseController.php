<?php

namespace App\Controller;

use App\Entity\Transaction;
use App\Form\DeliveryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @var TransactionRepository
     */
    private $repository;


    public function __construct(EntityManagerInterface $em)
    {
      $this->em = $em;  
    }


    /**
     * @Route("/base", name="base")
     * @param Transaction $transaction
     */
    public function index(Request $request): Response
    {
        $transaction = new Transaction();
        $form = $this->createForm(DeliveryType::class, $transaction);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($transaction);
            $this->em->flush();
            $this->addFlash('success','Votre enregistrement a été faite avec succès !');
            return $this->redirectToRoute('show');
        }

        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
            'form' =>$form->createView()
        ]);
    }

    /**
     * @Route("/show", name="show")
     */
    public function show(): Response
    {
        return $this->render('base/show.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
}
