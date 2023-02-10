<?php

declare(strict_types=1);

namespace App\Interfaces\Mapper;

use App\Entity\Color;

interface IColorMapper {
    public function MapToColor(iterable $body) : Color;
    public function MapToArray(Color $color) : iterable;
}