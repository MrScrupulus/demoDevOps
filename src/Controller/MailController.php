<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

final class MailController extends AbstractController
{
    #[Route('/mail', name: 'send_mail')]
    public function sendMail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('demo@exemple.com')
            ->to('test@exemple.com')
            ->subject('CDA Test')
            ->text('Ceci est un email de test')
            ->html('<h2>Bonjour les gens</h2><p>Ceci est un email de test</p>');

        $mailer->send($email);

        return new Response('Email envoyé');
    }
    
}
