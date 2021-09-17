<?php

namespace App\Twig\Extension;

use Doctrine\Common\Collections\ArrayCollection;
use JetBrains\PhpStorm\NoReturn;
use Pimcore\Model\DataObject\Blog;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FeaturedPostExtension extends AbstractExtension
{

    public function getFunctions()
    {
        return [
            new TwigFunction('get_featured_post', [$this, 'getFeaturedPost']),
            new TwigFunction('get_all_posts', [$this, 'getAllPost']),
        ];
    }

    /**
     * @return Blog|null
     * @throws \Exception
     */
    public function getFeaturedPost(): ?Blog
    {
        $posts = new ArrayCollection(Blog::getList()->load());

        $post = $posts->filter(function (Blog $post){
            return $post->getAutoPublished();
        });

        return  $post->first();
    }

    /**
     * @throws \Exception
     */
    #[NoReturn] public function getAllPost()
    {
        $posts = new ArrayCollection(Blog::getList()->load());

         return $posts->filter(function (Blog $post){
             return !$post->getAutoPublished();
        });
    }

}
