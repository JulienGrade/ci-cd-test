<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;

class HomepageControllerTest extends WebTestCase
{
    private function requestHomepage(): Crawler
    {
        // Cette méthode nous donne un client
        $client = static::createClient();
        // On lance une requête sur l'url / depuis notre client
        return $client->request('GET', '/');
    }

    /**
     * Permet de tester que l'on reçoit un code 200 lorsque l'on est sur / soit l'accueil du site
     * @return void
     */
    public function testHomepage(): void
    {
        $this->requestHomepage();
        self::assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    // Permet de vérifier la présence d'un titre h1 contenant Bienvenue sur la page d'accueil
    public function testMainTitleOnHomepage(): void
    {
        $this->requestHomepage();
        self::assertSelectorTextContains('h1', 'Bienvenue');
    }
}