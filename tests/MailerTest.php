<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MailerTest extends WebTestCase
{
    public function testSendMail(): void
    {
        $client = static::createClient();
        
        // Faire une requête GET vers la route /mail
        $client->request('GET', '/mail');
        
        // Vérifier que la réponse est réussie (200)
        $this->assertResponseIsSuccessful();
        
        // Vérifier que la réponse contient le message de confirmation
        $this->assertStringContainsString('Email envoyé', $client->getResponse()->getContent());
        
        // Vérifier que la réponse a le bon statut HTTP
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
