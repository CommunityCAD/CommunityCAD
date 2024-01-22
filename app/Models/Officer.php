<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Officer extends Model
{
    use HasFactory, softDeletes;

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date_of_birth' => 'date',
    ];

    public function getSNNAttribute()
    {
        return implode('-', str_split($this->id, 3));
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFormattedNameAttribute()
    {
        return $this->formatName($this->first_name . ' ' . $this->last_name);
    }

    public function getAddressAttribute()
    {
        return $this->postal . ' ' . $this->street . ' ' . $this->city;
    }

    public function getAgeAttribute()
    {
        $birthday = $this->date_of_birth;
        $age = Carbon::parse($birthday)->age;

        return $age;
    }

    public function user_department()
    {
        return $this->belongsTo(UserDepartment::class);
    }

    private function formatName($name)
    {
        $name = explode(' ', $name);
        switch (get_setting('officer_name_format')) {
            case 'F. Last':
                $formatted_name = substr($name[0], 0, 1) . '. ' . $name[1];
                break;

            case 'First Last':
                $formatted_name = $name[0] . ' ' . $name[1];
                break;

            case 'First L.':
                $formatted_name = $name[0] . ' ' . substr($name[1], 0, 1) . '.';
                break;

            default:
                $formatted_name = substr($name[0], 0, 1) . '. ' . $name[1];
                break;
        }

        return $formatted_name;
    }
}
