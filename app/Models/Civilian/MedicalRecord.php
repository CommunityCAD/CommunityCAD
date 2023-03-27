<?php

namespace App\Models\Civilian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'value',
        'civilian_id',
    ];
}
