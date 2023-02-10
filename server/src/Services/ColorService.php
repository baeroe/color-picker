<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\Repositories\IColorRepository;
use App\Interfaces\Services\IColorService;
use App\Entity\Color;

class ColorService implements IColorService {
    
    protected IColorRepository $colorRep;

    public function __construct(IColorRepository $_colorRep)
    {
        $this->colorRep = $_colorRep;
    }

    public function getAll() : iterable 
    {
        return $this->colorRep->all();
    }
    public function get(int $id) : Color
    {
        return $this->colorRep->get($id);
    }

    public function delete(int $id) : void 
    {
        $this->colorRep->delete($id);
    }
    public function add(Color $color) : Color {
        return $this->colorRep->save($color);
    }
}