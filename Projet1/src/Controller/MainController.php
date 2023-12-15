<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    
    #[Route('/', name: 'home')]
    public function index(ArticleRepository $articleRepository,CategoryRepository $categoryRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'Bienvenue sur votre site d\'information',
            'articles' => $articleRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig', [
            'contact_param' => 'Contact-Moi !',
        ]);
    }
    #[Route('/article', name: 'article')]
    public function article(ArticleRepository $articleRepository): Response
    {
        return $this->render('main/article.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'category')]
    public function category(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
