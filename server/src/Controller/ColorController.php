<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Interface\Mapper\ColorMapperInterface;
use App\Interface\Service\ColorServiceInterface;


#[Route('/api')]
class ColorController extends AbstractController
{
    protected ColorMapperInterface $colorMapper;
    protected ColorServiceInterface $colorService;

    public function __construct(ColorMapperInterface $colorMapper, ColorServiceInterface $colorService)
    {
        $this->colorMapper = $colorMapper;
        $this->colorService = $colorService;
    }

    #[Route('/color', name: 'color_index', methods: ['GET'])]
    public function index(): Response
    {
        $colors = $this->colorService->getAll();

        $data = [];
        foreach ($colors as $color) {
            $data[] = $this->colorMapper->MapToArray($color);
        }

        return $this->json($data);
    }

    #[Route('/color', name: 'color_new', methods: ['POST'])]
    public function new(Request $request): Response
    {
        $body = json_decode($request->getContent(), true);

        $color = $this->colorMapper->MapToColor($body);
        $color = $this->colorService->add($color);

        return $this->json('Created new color successfully with id ' . $color->getId());
    }

    #[Route('/color/{id}', name: 'color_delete', methods: ['DELETE'])]
    public function delete(int $id): Response
    {
        $color = $this->colorService->get($id);
        if (!$color) {
            return $this->json('No color found for id' . $id, 404);
        }

        $this->colorService->delete($id);

        return $this->json('Deleted a color successfully with id ' . $id);
    }
}
