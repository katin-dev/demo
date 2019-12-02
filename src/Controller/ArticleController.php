<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function articles()
    {
        $article = new Article();
        $article->setName('First');
        $article->setContent('First content');

        $articles = [
            $article
        ];

    }
}
