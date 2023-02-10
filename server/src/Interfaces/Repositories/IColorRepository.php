<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use App\Entity\Color;

interface IColorRepository {
    /**
     * @param object $object
     */
    public function save(Color $object): Color;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;

    /**
     * @return array<int|string, mixed>
     */
    public function all(): iterable;

    /**
     * @param int $id
     * @return Color
     */
    public function get(int $id): Color;
}