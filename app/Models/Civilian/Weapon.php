<?php

namespace App\Models\Civilian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weapon extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'model',
        'civilian_id',
        'serial_number',
    ];
}
