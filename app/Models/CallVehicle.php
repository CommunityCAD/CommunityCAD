<?php

namespace App\Models;

use App\Models\Civilian\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallVehicle extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $with = ['vehicle'];

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    }
}
