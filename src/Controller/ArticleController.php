<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManager;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Rest\Get("/articles", name="articles")
     */
    public function articles()
    {
        $article = new Article();
        $article->setName('First');
        $article->setContent('First content');

        $articles = [
            $article
        ];

        return View::create($articles);
    }

    /**
     * @Rest\Post("/articles", name="articles_create")
     * @param Request $request
     * @param EntityManager $em
     * @param SerializerInterface $serializer
     * @return View
     * @throws \Doctrine\ORM\ORMException
     */
    public function create(Request $request, SerializerInterface $serializer)
    {

        $em = $this->getDoctrine()->getManager();
        $r = $em->getRepository(Article::class);
        $a = new Article();
        $a->setName($request->get('name'));
        $a->setContent($request->get('content'));

        $em->persist($a);
        $em->flush();

        return View::create($a);
    }
}
