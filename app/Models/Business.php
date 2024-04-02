<?php

namespace App\Models;

use App\Models\Civilian\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $with = ['owner'];

    public function owner()
    {
        return $this->hasOne(Civilian::class, 'id', 'owner_id')->without(['licenses', 'medical_records', 'vehicles', 'weapons']);
    }

    public function employees()
    {
        return $this->hasMany(BusinessEmployee::class)->with('civilian')->orderBy('role', 'desc');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
