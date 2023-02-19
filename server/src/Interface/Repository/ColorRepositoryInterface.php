<?php

namespace App\Interface\Repository;

use App\Entity\Color;

interface ColorRepositoryInterface
{
    public function save(Color $object): Color;
    public function delete(int $id): void;
    public function all(): iterable;
    public function get(int $id): Color;
}
