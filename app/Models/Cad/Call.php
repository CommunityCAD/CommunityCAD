<?php

namespace App\Models\Cad;

use App\Models\Civilian;
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
        'units' => 'array',
    ];

    protected $with = ['user', 'civilian'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'lead_user_id');
    }

    public function civilian()
    {
        return $this->hasOne(Civilian::class, 'id', 'rp_civilian_id');
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
            case 1:
                return "Police Department";
                break;

            case 2:
                return "Fire Department";
                break;

            case 3:
                return "EMS";
                break;

            default:
                # code...
                break;
        }
    }
}
