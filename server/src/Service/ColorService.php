<?php

namespace App\Service;

use App\Interface\Repository\ColorRepositoryInterface;
use App\Interface\Service\ColorServiceInterface;
use App\Entity\Color;

class ColorService implements ColorServiceInterface
{

    protected ColorRepositoryInterface $colorRep;

    public function __construct(ColorRepositoryInterface $_colorRep)
    {
        $this->colorRep = $_colorRep;
    }

    public function getAll(): iterable
    {
        return $this->colorRep->all();
    }

    public function get(int $id): Color
    {
        return $this->colorRep->get($id);
    }

    public function delete(int $id): void
    {
        $this->colorRep->delete($id);
    }

    public function add(Color $color): Color
    {
        return $this->colorRep->save($color);
    }
}
