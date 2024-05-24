<?php 
namespace App\Controller;

use App\Entity\Seances;
use App\Form\SeancesType;
use App\Repository\SeancesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/seances')]
class SeancesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_seances_index', methods: ['GET'])]
    public function index(SeancesRepository $seancesRepository): Response
    {
        return $this->render('admin/seances/index.html.twig', [
            'seances' => $seancesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_seances_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $seance = new Seances();
        $form = $this->createForm(SeancesType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($seance);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_seances_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/seances/new.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_seances_show', methods: ['GET'])]
    public function show(Seances $seance): Response
    {
        return $this->render('seances/show.html.twig', [
            'seance' => $seance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_seances_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Seances $seance): Response
    {
        $form = $this->createForm(SeancesType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('app_seances_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/seances/edit.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    #[Route('/seances/users', name: 'app_user_seances', methods: ['GET'])]
    public function userConventions(): Response
    {
        $seances = $this->entityManager->getRepository(Seances::class)->findAll();

        return $this->render('seances/user_seances.html.twig', [
            'seances' => $seances,
        ]);
    }

    #[Route('/{id}', name: 'app_seances_delete', methods: ['POST'])]
    public function delete(Request $request, Seances $seance = null): Response
    {
        if (!$seance) {
            throw $this->createNotFoundException('No seance found for id '.$request->get('id'));
        }

        if ($this->isCsrfTokenValid('delete'.$seance->getId(), $request->request->get('_token'))) {
            $this->entityManager->remove($seance);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('app_seances_index', [], Response::HTTP_SEE_OTHER);
    }
}
