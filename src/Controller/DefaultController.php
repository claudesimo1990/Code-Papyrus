<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

}
