<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ChuckNorrisJokeController extends AbstractController
{
    public function __construct(private readonly HttpClientInterface $httpClient)
    {
    }

    #[Route('/api/joke/random', name: 'app_random_joke', methods: ['GET'])]
     public function fetchRandomJoke(): JsonResponse
    {
        try {
            $response = $this->httpClient->request('GET', 'https://api.chucknorris.io/jokes/random');
            $statusCode = $response->getStatusCode();
            $contentType = $response->getHeaders()['content-type'][0] ?? 'application/json';

            if ($statusCode === Response::HTTP_OK) {
                if (str_contains($contentType, 'application/json')) {
                    $data = $response->toArray();
                    return new JsonResponse($data);
                } else {
                    $content = $response->getContent();
                    return new JsonResponse(['data' => $content]);
                }
            } else {
                return new JsonResponse(['error' => 'Failed to fetch data from external URL', 'status_code' => $statusCode], $statusCode);
            }
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'An error occurred: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
