<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CivilianLevel extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $casts = [
        'license_types_allowed' => 'array',
    ];
}
