<?php

namespace App\Repository;

use App\Entity\Color;
use App\Interface\Repository\ColorRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ColorRepository extends ServiceEntityRepository implements ColorRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Color::class);
    }

    public function save(Color $entity): Color
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function delete(int $id): void
    {
        $color = $this->find($id);
        if ($color instanceof Color) {
            $this->_em->remove($color);
            $this->_em->flush();
        }
    }

    public function get(int $id): Color
    {
        return $this->find($id);
    }

    public function all(): iterable
    {
        return $this->findAll();
    }
}
