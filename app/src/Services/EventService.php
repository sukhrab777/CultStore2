<<<<<<< HEAD:app/src/Services/EventService.php
<?php

namespace App\Services;

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
=======
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
>>>>>>> c2113d5352be1dc0aa28d45508787f88b1c82bcd:app/src/Service/EventService.php
}