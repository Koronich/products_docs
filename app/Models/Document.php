<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $date
 * @property string $type
 */
class Document extends Model
{
    use HasFactory;

    const TYPE_IN = 'in';

    const TYPE_OUT = 'out';

    protected $table = 'documents';

    protected $fillable = [
        'date',
        'type'
    ];


}
