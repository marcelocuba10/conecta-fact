<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Providers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'last_name',
        'email',
        'doc_number',
        'manager',
        'company'
    ];
    
    protected static function newFactory()
    {
        return \Modules\User\Database\factories\ProvidersFactory::new();
    }
}
