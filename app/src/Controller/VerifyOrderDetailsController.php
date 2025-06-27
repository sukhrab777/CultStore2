<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VerifyOrderDetailsController extends AbstractController
{
    #[Route('/verification', name: 'app_verify_order_details')]
    public function index(): Response
    {
           $user = $this->getUser();
         if (!$user) {
                return $this->redirectToRoute('app_login');
            }

            // On suppose que l'utilisateur a une méthode getAddresses()
            $addresses= $user->getAddress();

        return $this->render('verify_order_details/index.html.twig', [
            'addresses' => $addresses,

        ]);
    }
}
