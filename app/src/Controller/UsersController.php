<?php

     namespace App\Controller;

     use App\Entity\Users;
     use App\Form\UsersAvatarType;
     use App\Repository\OrdersRepository;
     use Doctrine\ORM\EntityManagerInterface;
     use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
     use Symfony\Component\HttpFoundation\Request;
     use Symfony\Component\HttpFoundation\Response;
     use Symfony\Component\HttpFoundation\File\Exception\FileException;
     use Symfony\Component\Routing\Annotation\Route;
     use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

     class UsersController extends AbstractController
     {
         #[Route('/mon-compte', name: 'app_user_account')]
         public function account(OrdersRepository $orderRepository): Response
         {
             $user = $this->getUser();
             if (!$user instanceof Users) {
                 return $this->redirectToRoute('app_login');
             }

             $orders = $orderRepository->findBy(['user' => $user], ['order_date' => 'DESC']);

             return $this->render('users/account.html.twig', [
                 'user' => $user,
                 'orders' => $orders,
             ]);
         }

         #[Route('/mon-compte/avatar', name: 'app_user_avatar')]
         public function updateAvatar(Request $request, EntityManagerInterface $entityManager): Response
         {
             $user = $this->getUser();
             if (!$user instanceof Users) {
                 return $this->redirectToRoute('app_login');
             }

             $form = $this->createForm(UsersAvatarType::class, $user);
             $form->handleRequest($request);

             if ($form->isSubmitted() && $form->isValid()) {
                 $avatarFile = $form->get('avatar')->getData();
                 if ($avatarFile) {
                     $newFilename = uniqid().'.'.$avatarFile->guessExtension();
                     try {
                         $avatarFile->move(
                             $this->getParameter('avatars_directory'),
                             $newFilename
                         );
                         $user->setAvatar($newFilename);
                         $entityManager->flush();
                         $this->addFlash('success', 'Avatar mis à jour !');
                     } catch (FileException $e) {
                         $this->addFlash('error', 'Erreur lors de l\'upload de l\'avatar.');
                     }
                 }
                 return $this->redirectToRoute('app_user_account');
             }

             return $this->render('user/avatar.html.twig', [
                 'form' => $form->createView(),
             ]);
         }

         #[Route(path: '/login', name: 'app_login')]
         public function login(AuthenticationUtils $authenticationUtils): Response
         {
             $error = $authenticationUtils->getLastAuthenticationError();
             $lastUsername = $authenticationUtils->getLastUsername();

             return $this->render('users/login.html.twig', [
                 'last_username' => $lastUsername,
                 'error' => $error,
             ]);
         }

         #[Route(path: '/logout', name: 'app_logout')]
         public function logout(): void
         {
             throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
         }
     }