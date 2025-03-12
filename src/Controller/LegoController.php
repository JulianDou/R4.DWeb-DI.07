<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\LegoRepository;
use App\Entity\LegoCollection;
use App\Repository\LegoCollectionRepository;

/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    // L'attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode home() pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.

    #[Route('/', name: 'home')]
    public function home(LegoRepository $legoRepository, LegoCollectionRepository $legoCollectionRepository): Response
    {
        $legos = $legoRepository->findAll();
        $categories = $legoCollectionRepository->findAll();
        return $this->render('lego.html.twig', [
            'legos' => $legos,
            'categories' => $categories,
        ]);
    }

    #[Route('/collection/{collection}', name: 'collection')]
    public function collection(LegoCollectionRepository $legoCollectionRepository, $collection): Response
    {
        $targetCollection = $legoCollectionRepository->find($collection);
        $legos = $targetCollection->getLegos();
        return $this->render('lego.html.twig', [
            'legos' => $legos,
            'categories' => $legoCollectionRepository->findAll(),
        ]);
    }

    #[Route('/test/{id}', 'test')]
    public function test(LegoCollection $collection): Response
    {
        dd($collection);
    }

}

