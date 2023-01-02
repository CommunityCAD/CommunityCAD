<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $incrementing = false;

    protected $guarded = [];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'last_login' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'member_join_date' => 'datetime',
        'birthday' => 'date'
    ];

    public function applications()
    {
        return $this->hasMany('App\Models\Application');
    }

    public static function dec2hex($number)
    {
        $hexvalues = array(
            '0', '1', '2', '3', '4', '5', '6', '7',
            '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'
        );
        $hexval = '';
        while ($number != '0') {
            $hexval = $hexvalues[bcmod($number, '16', 0)] . $hexval;
            $number = bcdiv($number, '16', 0);
        }
        return $hexval;
    }

    public function getAgeAttribute()
    {
        $birthday = $this->birthday;
        $age = Carbon::parse($birthday)->age;

        return $age;
    }
}
