<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Model\DataObject\Team;
use App\Entity\Contact;
use App\Form\Type\ContactType;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends BaseController
{
    /**
     * @return Response
     */
    public function createAction(): Response
    {
        $owner = Team::getList()->getData()[0];

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        return $this->render('content/contact.html.twig', [
            'owner' => $owner,
            'form' => $form->createView()
        ]);

    }

    /**
     * This route has a greedy pattern and is defined first.
     *
     * @Route("/contact/store", name="contact_store")
     * @throws \Exception
     */
    public function storeAction(\Swift_Mailer $mailer): Response
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo('recipient@example.com')
            ->setBody(
                $this->renderView(
                    'email/contact.html.twig',
                    array('name' => 'simo')
                )
            )
        ;
        $mailer->send($message);

        return new Response('message send');
    }

}
