<?php

namespace App\Models;

use App\Models\Civilian\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $casts = [
        'offense_occured_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function civilian()
    {
        return $this->hasOne(Civilian::class, 'id', 'civilian_id');
    }

    public function license()
    {
        return $this->hasOne(License::class, 'id', 'license_id');
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    public function charges()
    {
        return $this->hasMany(Charges::class);
    }
}
