<?php

namespace App\Models;

use App\Models\Civilian\MedicalRecord;
use App\Models\Civilian\Vehicle;
use App\Models\Civilian\Weapon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Civilian extends Model
{
    use HasFactory, softDeletes;

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date_of_birth' => 'date',
    ];

    protected $with = ['licenses', 'medical_records', 'vehicles', 'weapons'];

    public function getSNNAttribute()
    {
        return implode('-', str_split($this->id, 3));
    }

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'Alive';
                break;
            case 2:
                return 'Wanted';
                break;
            case 3:
                return 'Jailed';
                break;
            case 4:
                return 'Dead';
                break;
            case 5:
                return 'Hospitalized';
                break;
        }
    }

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getAddressAttribute()
    {
        return $this->postal.' '.$this->street.' '.$this->city;
    }

    public function getAgeAttribute()
    {
        $birthday = $this->date_of_birth;
        $age = Carbon::parse($birthday)->age;

        return $age;
    }

    public function licenses()
    {
        return $this->HasMany(License::class);
    }

    public function medical_records()
    {
        return $this->HasMany(MedicalRecord::class);
    }

    public function vehicles()
    {
        return $this->HasMany(Vehicle::class);
    }

    public function weapons()
    {
        return $this->HasMany(Weapon::class);
    }
}
