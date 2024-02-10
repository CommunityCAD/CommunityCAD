<?php

namespace App\Models;

use App\Models\Cad\ActiveUnit;
use App\Models\Cad\CallNatures;
use App\Models\Cad\CallStatuses;
use App\Models\CallActiveUnit;
use App\Models\CallCivilian;
use App\Models\CallLog;
use App\Models\Civilian;
use App\Models\Report;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Call extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $with = [];

    public function call_log()
    {
        return $this->hasMany(CallLog::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function attached_units()
    {
        return $this->belongsToMany(ActiveUnit::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function call_civilians()
    {
        return $this->hasMany(CallCivilian::class);
    }

    public function call_vehicles()
    {
        return $this->hasMany(CallVehicle::class);
    }

    public function getTimeAttribute()
    {
        $updated_at = Carbon::parse($this->updated_at);
        $now = Carbon::now(config('app.timezone'));

        $age = $updated_at->diffInMinutes($now);

        return $age;
    }

    public function getTypeNameAttribute()
    {
        switch ($this->type) {
            case '1':
                return 'LEO';
                break;

            case 2:
                return 'FD';
                break;

            case 3:
                return 'EMS';
                break;

            default:
                return 'UKN';
                break;
        }
    }

    public function getStatusInfoAttribute()
    {
        return CallStatuses::STATUSCODES[$this->status];
    }

    public function getNatureInfoAttribute()
    {
        if (array_key_exists($this->nature, CallNatures::NATURECODES)) {
            return CallNatures::NATURECODES[$this->nature];
        }

        return false;
    }

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $number = Call::count() + 1;
                $model->id = date('y') . str_pad($number, 5, '0', STR_PAD_LEFT);
            }
        );
    }
}
