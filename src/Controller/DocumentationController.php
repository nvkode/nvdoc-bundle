<?php

namespace Nvkode\NvdocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    name: 'nvdoc_'
)]
class DocumentationController extends AbstractController
{
    #[Route(
        path: '/docs/index',
        name: 'read',
        methods: ['GET']
    )]
    public function read(): JsonResponse
    {
        return $this->json([]);

    }

}