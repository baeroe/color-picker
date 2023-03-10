<?php

namespace App\Mapper;

use App\Interface\Mapper\ColorMapperInterface;
use App\Entity\Color;

class ColorMapper implements ColorMapperInterface
{
    public function MapToColor(iterable $body): Color
    {
        $color = new Color();

        $color->setRed($body['red']);
        $color->setGreen($body['green']);
        $color->setBlue($body['blue']);
        $color->setName($body['name']);

        $hexcode = sprintf("#%02x%02x%02x", $body['red'], $body['green'], $body['blue']);
        $color->setHexcode($hexcode);

        return $color;
    }

    public function MapToArray(Color $color): iterable
    {
        return
            [
                'id' => $color->getId(),
                'name' => $color->getName(),
                'red' => $color->getRed(),
                'green' => $color->getGreen(),
                'blue' => $color->getBlue(),
                'hexcode' => $color->getHexcode(),
            ];
    }
}
