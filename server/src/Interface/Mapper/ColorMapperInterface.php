<?php

namespace App\Interface\Mapper;

use App\Entity\Color;

interface ColorMapperInterface
{
    public function MapToColor(iterable $body): Color;
    public function MapToArray(Color $color): iterable;
}
