<?php

namespace App\Models\Cad;

use App\Models\Call;
use App\Models\Officer;
use App\Models\User;
use App\Models\UserDepartment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActiveUnit extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    // protected $with = ['officer', 'user_department', 'calls'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'first_on_duty_at' => 'datetime',
        'off_duty_at' => 'datetime',
    ];

    public function getTimeAttribute()
    {
        $updated_at = Carbon::parse($this->updated_at);
        $now = Carbon::now(config('app.timezone'));

        $age = $updated_at->diffInMinutes($now);

        return $age;
    }

    public function getDisplayNameAttribute()
    {
        return $this->formatName($this->getOfficerNameAttribute());
    }

    public function getOfficerNameAttribute()
    {
        return isset($this->officer->name) ? $this->officer->name : auth()->user()->preferred_name;
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }

    public function user_department()
    {
        return $this->belongsTo(UserDepartment::class);
    }

    public function calls()
    {
        return $this->belongsToMany(Call::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDisplayStatusTextColorAttribute()
    {
        switch ($this->status) {
            case 'AVL':
                return 'text-green-500';
                break;

            case 'BRK':
                return 'text-gray-500';
                break;

            case 'ENRUTE':
                return 'text-yellow-500';
                break;

            case 'ONSCN':
                return 'text-orange-500';
                break;

            default:
                return 'text-red-500';
                break;
        }
    }

    private function formatName($name)
    {
        $name_array = explode(' ', $name, 2);
        if (isset($name_array[1])) {

            switch (get_setting('officer_name_format')) {
                case 'F. Last':
                    $formatted_name = substr($name_array[0], 0, 1) . '. ' . $name_array[1];
                    break;

                case 'First Last':
                    $formatted_name = $name_array[0] . ' ' . $name_array[1];
                    break;

                case 'First L.':
                    $formatted_name = $name_array[0] . ' ' . substr($name_array[1], 0, 1) . '.';
                    break;

                default:
                    $formatted_name = substr($name_array[0], 0, 1) . '. ' . $name_array[1];
                    break;
            }
        } else {
            return $formatted_name = $name;
        }

        return $formatted_name;
    }
}
