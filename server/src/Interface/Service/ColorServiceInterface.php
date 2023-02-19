<?php

namespace App\Interface\Service;

use App\Entity\Color;

interface ColorServiceInterface
{
    public function getAll(): iterable;
    public function delete(int $id): void;
    public function add(Color $color): Color;
    public function get(int $id): Color;
}
