<?php

namespace App\Controller;

use App\Service\EventService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    #[Route('/events', name: 'events_index')]
    public function index(): Response
    {
        $events = $this->eventService->getEvents();
        return $this->render('events/index.html.twig', [
            'events' => $events,
        ]);
    }
}
