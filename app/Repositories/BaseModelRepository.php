<?php

namespace App\Repositories;

use App\Interfaces\BaseModelRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Base Repository for models
 */
abstract class BaseModelRepository implements BaseModelRepositoryInterface
{
    /** @var string class of using model */
    protected const MODEL_CLASS = Model::class;

    /**
     * @param int $id
     *
     * @return Model
     */
    public static function getById(int $id): Model
    {
        return static::MODEL_CLASS::findOrFail($id);
    }

    /**
     * @return Collection|null
     */
    public static function all(): ?Collection
    {
        return static::MODEL_CLASS::all();
    }
}
