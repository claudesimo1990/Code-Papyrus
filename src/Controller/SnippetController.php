<?php


namespace App\Controller;


class SnippetController extends BaseController
{
    public function footerAction() {
        return $this->render('includes/footer.html.twig');
    }

}
