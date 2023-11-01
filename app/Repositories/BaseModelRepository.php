<?php

namespace App\Repositories;

use App\Interfaces\BaseModelRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModelRepository implements BaseModelRepositoryInterface
{
    protected const MODEL_CLASS = Model::class;

    public static function getById(int $id): Model
    {
        return static::MODEL_CLASS::findOrFail($id);
    }

    public static function all(): ?Collection
    {
        return static::MODEL_CLASS::all();
    }
}
