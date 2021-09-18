<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Model\DataObject\Project;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{

    /**
     * @Template
     */
    public function defaultAction(Request $request): Response
    {
        $requestUri = $request->getRequestUri();

        return $this->render('default/default.html.twig', [
            'isPortal' => true,
            'requestUri' => $requestUri
        ]);
    }

    #[Route('/books/{project}', name: 'book_show')]
    public function showAction(Project $project)
    {
        return $this->render('book/show.html.twig', [
            'book' => $project,
            'isPortal' => false
        ]);
    }

}
