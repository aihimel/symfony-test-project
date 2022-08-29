<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Brand;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class BrandController extends AbstractController
{

    #[Route('/api/brand/', name: 'brand_index')]
    public function index( ManagerRegistry $doctrine ): JsonResponse
    {

        $message = '';
        $entityManager = $doctrine->getManager();

        $brands = $entityManager->getRepository(Brand::class)->findAll();

        if ($brands) {
            $messages = "All brands fetched successfully.";
            foreach( $brands as $brand ) {
                $body[] = [
                    'id'   => $brand->getId(),
                    'name' => $brand->getName(),
                    'slug' => $brand->getSlug()
                ];
            }
        } else {
            $message = "There is a problem fetching brands.";
        }

        return $this->json([
            'message' => $message,
            'brands' => $body
        ], 404);
    }

    #[Route('/api/brand/create', name: 'brand_create')]
    public function create(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $brand = new Brand();
        $brand->setName($request->get('name'));
        if (!$request->get('slug')) {
            $brand->setSlug('demo');
        } else {
            $brand->setSlug($request->get('slug'));
        }

        $entityManager->persist($brand);

        $entityManager->flush();

        return $this->json([
            'message' => 'New Brand Created Successfully',
            'object' => [
                'id' => $brand->getId(),
                'name' => $brand->getName(),
                'slug' => $brand->getSlug()
            ]
        ]);
    }


    #[Route('/api/brand/view/{id}', name: 'brand_view')]
    public function view(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        
        $entityManager = $doctrine->getManager();
        $brand = $entityManager->getRepository(Brand::class)->find($id);

        if ($brand) {
            return $this->json([
                'message' => 'Single brand fetched successfully.',
                'object' => [
                    'id' => $brand->getId(),
                    'name' => $brand->getName(),
                    'slug' => $brand->getSlug()
                ]
            ]);
        }

    }

    
}
