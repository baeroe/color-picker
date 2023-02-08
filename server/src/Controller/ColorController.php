<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Color;

/**
 * @Route("/api", name="api_")
 */
class ColorController extends AbstractController
{
    /**
    * @Route("/color", name="color_index", methods={"GET"})
    */
    public function index(ManagerRegistry $doctrine): Response
    {
        $colors = $doctrine
            ->getRepository(Color::class)
            ->findAll();
  
        $data = [];
  
        foreach ($colors as $color) {
           $data[] = [
               'id' => $color->getId(),
               'name' => $color->getName(),
               'red' => $color->getRed(),
               'green' => $color->getGreen(),
               'blue' => $color->getBlue(),
               'hexcode' => $color->getHexcode(),
           ];
        }
        return $this->json($data);
    }
 
  
    /**
     * @Route("/color", name="color_new", methods={"POST"})
     */
    public function new(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        
        $parameters = json_decode($request->getContent(), true);

        $color = new Color();
        $color->setRed($parameters['red']);
        $color->setGreen($parameters['green']);
        $color->setBlue($parameters['blue']);
        $color->setName($parameters['name']);

        $hexcode = sprintf("#%02x%02x%02x", $parameters['red'], $parameters['green'], $parameters['blue']);
        $color->setHexcode($hexcode);  
        
        $entityManager->persist($color);
        $entityManager->flush();
  
        return $this->json('Created new color successfully with id ' . $color->getId());
    }
  
    /**
     * @Route("/color/{id}", name="color_delete", methods={"DELETE"})
     */
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $color = $entityManager->getRepository(Color::class)->find($id);
  
        if (!$color) {
            return $this->json('No color found for id' . $id, 404);
        }
  
        $entityManager->remove($color);
        $entityManager->flush();
  
        return $this->json('Deleted a color successfully with id ' . $id);
    }


}
