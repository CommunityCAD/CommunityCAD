<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'birthday' => 'date',
        'reapply_date' => 'date',
    ];

    public function applications()
    {
        return $this->hasMany('App\Models\Application');
    }

    public function active_unit()
    {
        return $this->hasOne('App\Models\Cad\ActiveUnit');
    }

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }

    public static function dec2hex($number)
    {
        $hexvalues = [
            '0', '1', '2', '3', '4', '5', '6', '7',
            '8', '9', 'A', 'B', 'C', 'D', 'E', 'F',
        ];
        $hexval = '';
        while ($number != '0') {
            $hexval = $hexvalues[bcmod($number, '16', 0)].$hexval;
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

    public function getDiscordAttribute()
    {
        if ($this->discriminator == 0) {
            return $this->discord_name;
        }

        return $this->discord_name.'#'.$this->discriminator;
    }

    public function getOfficerNameCheckAttribute()
    {
        return $this->officer_name ? $this->officer_name : $this->discord_name;
    }

    public function getStatusNameAttribute()
    {
        switch ($this->account_status) {
            case 1:
                return 'User';
                break;
            case 2:
                return 'Applicant';
                break;
            case 3:
                return 'Member';
                break;
            case 4:
                return 'Suspended/LOA';
                break;
            case 5:
                return 'Temporary Ban';
                break;
            case 6:
                return 'Permanent Ban';
                break;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // public function civilian_level()
    // {
    //     return $this->hasOne(CivilianLevel::class, 'id', 'civilian_level_id');
    // }
}
