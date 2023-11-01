<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseModelRepositoryInterface
{
    public static function getById(int $id): Model;

    public static function all(): ?Collection;
}
