<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\LegoService;

/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    // L'attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode home() pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.

    #[Route('/', name: 'home')]
    public function home(LegoService $legoService): Response
    {
        $legos = $legoService->getAllLego();
        return $this->render('lego.html.twig', [
            'legos' => $legos,
        ]);
    }

    #[Route('/lego/{id}', name: 'lego')]
    public function lego($id, LegoService $legoService): Response
    {
        $legos = $legoService->getLego($id);
        return $this->render('lego.html.twig', [
            'legos' => $legos,
        ]);
    }

    #[Route('/collection/{collection}', name: 'collection')]
    public function collection($collection, LegoService $legoService): Response
    {
        $legos = $legoService->getCollection($collection);
        return $this->render('lego.html.twig', [
            'legos' => $legos,
        ]);
    }
}

