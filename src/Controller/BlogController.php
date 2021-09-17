<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use Pimcore\Model\DataObject\Blog;
use Pimcore\Model\DataObject\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BlogController extends BaseController
{
    /**
     * @Template
     * @throws \Exception
     */
    public function indexAction(Request $request): Response
    {
        $requestUri = $request->getRequestUri();

        $categories = Category::getList()->load();
        $blogs = Blog::getList()->load();

        return $this->render('blog/index.html.twig', [
            'isPortal' => true,
            'requestUri' => $requestUri,
            'blogs' => $blogs
        ]);
    }

    #[NoReturn] #[Route('/post/{slug}', name: 'post_show')]
    public function detailAction(String $slug, Request $request): Response
    {
        $post = Blog::getBySlug($slug)->current();

        return $this->render('blog/show.html.twig', [
            'post' => $post,
            'isPortal' => false,
        ]);
    }
}
