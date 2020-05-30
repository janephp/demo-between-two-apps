<?php

namespace App\Controller;

use Generated\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index(Client $client)
    {
        return $this->render('home.html.twig', [
            'beers' => $client->getBeers()
        ]);
    }
}
