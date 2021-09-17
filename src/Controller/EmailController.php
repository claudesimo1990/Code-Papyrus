<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class EmailController extends BaseController
{
    public function emailAction(Request $request)
    {
        return $this->render('email/contact.html.twig');
    }

}
