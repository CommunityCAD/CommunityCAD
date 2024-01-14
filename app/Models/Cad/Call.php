<?php

namespace App\Models\Cad;

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

    protected $with = ['user', 'civilian', 'call_log'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function civilian()
    {
        return $this->hasOne(Civilian::class, 'id', 'civilian_id');
    }

    public function call_log()
    {
        return $this->hasMany(CallLog::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function call_civilians()
    {
        return $this->hasMany(CallCivilian::class);
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

    public function getNiceUnitsAttribute()
    {
        $units = json_decode($this->units);

        return $units->data;
    }
}
