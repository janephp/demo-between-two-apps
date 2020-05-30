<?php

namespace App\Controller;

use App\Entity\Beer as BeerEntity;
use App\Repository\BeerRepository;
use Jane\AutoMapper\AutoMapperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Generated\Model\Beer as BeerModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class BeerController extends AbstractController
{
    public function list(BeerRepository $beerRepository, AutoMapperInterface $autoMapper, SerializerInterface $serializer)
    {
        $beerModels = \array_map(function (BeerEntity $beer) use ($autoMapper) {
            return $autoMapper->map($beer, BeerModel::class);
        }, $beerRepository->findAll());

        return new Response($serializer->serialize($beerModels, 'json'));
    }
}
