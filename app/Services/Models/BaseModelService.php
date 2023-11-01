<?php

namespace App\Services\Models;

use App\Interfaces\BaseModelRepositoryInterface;
use App\Interfaces\BaseModelServiceInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModelService implements BaseModelServiceInterface
{
    protected const MODEL_CLASS = Model::class;

    public static function create(array $fields): Model
    {
        return static::MODEL_CLASS::create($fields);
    }


    public static function update(int $id, array $fields): bool
    {
        $model = static::MODEL_CLASS::findOrFail($id);

        return $model->update($fields);
    }


    public static function delete(int $id): bool
    {
        $model = static::MODEL_CLASS::findOrFail($id);

        return $model->delete();
    }
}
