<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class EventService
{
    private $client;

   public function getEvents(): array
{
    return [
        [
            'title' => 'Japan Expo 2025',
            'date' => new \DateTime('2025-07-03'),
            'location' => 'Paris, France',
            'image' => 'japan-expo.jpg',
            'link' => 'https://www.japan-expo-paris.com/',
            'linkText' => 'Visiter le site'
        ],
        [
            'title' => 'Festival d’Annecy 2025',
            'date' => new \DateTime('2025-06-10'),
            'location' => 'Annecy, France',
            'image' => 'annecy-festival.jpg',
            'link' => 'https://www.annecy.org/',
            'linkText' => 'En savoir plus'
        ],
    ];
}
}
