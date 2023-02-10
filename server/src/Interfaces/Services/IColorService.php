<?php

declare(strict_types=1);

namespace App\Interfaces\Services;

use App\Entity\Color;

interface IColorService {
    public function getAll() : iterable;
    public function delete(int $id) : void;
    public function add(Color $color) : Color;
    public function get(int $id) : Color;
}