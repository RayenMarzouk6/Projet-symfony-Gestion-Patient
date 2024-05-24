<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SoinsRepository;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route("/", name: "home")]
    public function index(SoinsRepository $soinsRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'Soins' => $soinsRepository->findAll(),
        ]);
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        // Logic for about page
        return $this->render('dashbord.html.twig');
    }
}
