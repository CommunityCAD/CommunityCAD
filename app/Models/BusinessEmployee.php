<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessEmployee extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public function getRoleNameAttribute()
    {
        switch ($this->role) {
            case '1':
                return "Pending Interview";
                break;
            case '2':
                return "Employee";
                break;
            case '3':
                return "Manager";
                break;
            case '4':
                return "Co-Owner";
                break;
            case '5':
                return "Owner";
                break;

            default:
                return "Broken";
                break;
        }
    }


    public function civilian()
    {
        return $this->hasOne(Civilian::class, 'id', 'civilian_id')->without(['licenses', 'medical_records', 'vehicles', 'weapons']);
    }

    public function business()
    {
        return $this->hasOne(Business::class)->withTrashed();
    }
}
