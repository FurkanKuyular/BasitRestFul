<?php

namespace App\Controller\Api;

use App\Response\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    /**
     * @param JsonResponse $jsonResponse
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function jsonResponse(JsonResponse $jsonResponse)
    {
        return new \Symfony\Component\HttpFoundation\JsonResponse([
            'message' => $jsonResponse->getMessage() ?? 'fail',
            'payload' => $jsonResponse->getData() ?? null,
        ]);
    }
}
