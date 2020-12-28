<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ActorController extends AbstractController
{
    /**
     * @Route("/actor", name="actor")
     */
    public function index(): Response
    {
        $actors = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findAll();

        return $this->render('actor/index.html.twig', [
            'controller_name' => 'ActorController',
            'actors' => $actors
        ]);
    }

    /**
     * @Route("/show/{actorId<^[0-9]+$>}", name="show")
     * @ParamConverter("actors", class="App\Entity\Actor", options={"mapping": {"actorId": "id"}})
     */
    public function show(Actor $actors): Response
    {
        $programs = $actors->getPrograms();

        if (!$actors) {
            throw $this->createNotFoundException(
                'No program with id : '.($actors).' found in program\'s table.'
            );
        }

        return $this->render('actor/show.html.twig', [
            'programs' => $programs,
            'actors' => $actors,
        ]);
    }
}
