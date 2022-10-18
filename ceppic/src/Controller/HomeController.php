<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ArticleRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ArticleRepository $repo): Response
    {
       
        $listeArticle = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'liste_article' => $listeArticle,
        ]);
    }

    #[Route('/article/{id}', name: 'route_article')]
    public function article(int $id, ArticleRepository $repo): Response 
    {

        $article = $repo->find($id);

        return $this->render('home/article.html.twig', [
            'article' => $article, 
        ]);
    }
}
