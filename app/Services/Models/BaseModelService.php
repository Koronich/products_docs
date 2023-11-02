<?php

namespace App\Services\Models;

use App\Interfaces\BaseModelServiceInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Base Service fo models
 */
abstract class BaseModelService implements BaseModelServiceInterface
{
    /** @var string class of using model */
    protected const MODEL_CLASS = Model::class;

    /**
     * @param array $fields
     *
     * @return Model
     */
    public static function create(array $fields): Model
    {
        return static::MODEL_CLASS::create($fields);
    }

    /**
     * @param int   $id
     * @param array $fields
     *
     * @return bool
     */
    public static function update(int $id, array $fields): bool
    {
        $model = static::MODEL_CLASS::findOrFail($id);

        return $model->update($fields);
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public static function delete(int $id): bool
    {
        $model = static::MODEL_CLASS::findOrFail($id);

        return $model->delete();
    }
}
