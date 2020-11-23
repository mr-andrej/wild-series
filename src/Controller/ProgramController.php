<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController
{

    /**
     * Correspond à la route /programs/ et au name "program_index"
     * @Route("/", name="index")
     */
    public function index(): Response
    {

        return $this->render('Program/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }

    /**
     * Correspond à la route /programs/new et au name "program_new"
     * @Route("/new", name="new")
     */
    public function new(): Response
    {
        // traitement d'un formulaire par exemple

        // redirection vers la page 'program_show',
        // correspondant à l'url /programs/4
        return $this->redirectToRoute('program_show', ['id' => 4]);
    }

    /**
     * Correspond à la route /programs/show et au name "program_show"
     * @Route("/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="_show")
     */
    public function show(int $id): Response
    {
            return $this->render('Program/show.html.twig', ['id' => $id]);
    }


}