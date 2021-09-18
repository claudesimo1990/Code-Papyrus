<?php

namespace App\Controller;

use Pimcore\Model\DataObject\Project;

class ShopController extends BaseController
{
    public function indexAction()
    {
        $books = Project::getList()->getData();

        return $this->render('shop/index.html.twig', [
            'isPortal' => false,
            'books' => $books
        ]);
    }

}
