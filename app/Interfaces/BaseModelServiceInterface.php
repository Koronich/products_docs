<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseModelServiceInterface
{
    public static function create(array $fields): Model;
    public static function delete(int $id);
}
