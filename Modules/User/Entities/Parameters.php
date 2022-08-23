<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parameters extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cat_name',
        'status'
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\ParametersFactory::new();
    }
}
