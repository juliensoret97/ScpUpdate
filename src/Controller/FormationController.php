<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use Symfony\Component\Mime\Email;
use App\Repository\FormationRepository;
use PhpParser\Node\Scalar\MagicConst\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Address;

/**
 * @Route("/formation")
 */
class FormationController extends AbstractController
{
    protected $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }
    /**
     * @Route("/", name="formation", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('formation/index.html.twig');
    }

    /**
     * @Route("/detail", name="infoformation", methods={"GET"})
     */
    public function detail(): Response
    {

        return $this->render('formation/info.html.twig');
    }

    /**
     * @Route("/new", name="formation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            $email = new Email();
            $email->from(new Address('contact@mail.com', "info sur les inscris"))
                  ->to("jujukakato@gmail.com")
                  ->text("Une nouvelle inscription pour ". $formation->getChoix())
                  ->subject("Inscription");
    
            $this->mailer->send($email);

            return $this->redirectToRoute('formation_scp_index');
        }

        return $this->render('formation/new.html.twig', [
            'formation' => $formation,
            'form' => $form->createView(),
        ]);
    }

    public function sendEmail()
    {
       
    }
}
