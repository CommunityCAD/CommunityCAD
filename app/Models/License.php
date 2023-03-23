<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'expires_on' => 'date',
    ];

    protected $with = ['license_type'];

    public function civilian()
    {
        return $this->belongsTo(Civilian::class);
    }

    public function license_type()
    {
        return $this->hasOne(LicenseType::class, 'id', 'type');
    }


    public function getStatusNameAttribute()
    {
        switch ($this->license_status) {
            case 1:
                return "Valid";
                break;
            case 2:
                return "Expired";
                break;
            case 3:
                return "Suspended";
                break;
            case 4:
                return "Revoked";
                break;
            case 5:
                return "Temporary Ban";
                break;
        }
    }
}
