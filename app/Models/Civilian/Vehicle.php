<?php

namespace App\Models\Civilian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'plate',
        'model',
        'color',
        'registration_expire',
        'civilian_id',
        'vehicle_status',
    ];


    protected $casts = [
        'registration_expire' => 'date',
    ];

    public function getStatusNameAttribute()
    {
        switch ($this->vehicle_status) {
            case 1:
                return "Valid";
                break;
            case 3:
                return "Impounded";
                break;
            case 4:
                return "Booted";
                break;
            case 2:
                return "Stolen";
                break;
        }
    }
}
