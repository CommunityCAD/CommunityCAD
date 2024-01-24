<?php

namespace App\Models\Cad;

use App\Models\Officer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActiveUnit extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getTimeAttribute()
    {
        $updated_at = Carbon::parse($this->updated_at);
        $now = Carbon::now(config('app.timezone'));

        $age = $updated_at->diffInMinutes($now);

        return $age;
    }

    public function getNiceCallsAttribute()
    {
        $calls = json_decode($this->calls);

        return $calls->data;
    }

    public function getDisplayNameAttribute()
    {
        return $this->formatName($this->getOfficerNameAttribute());
    }

    public function getOfficerNameAttribute()
    {
        return isset($this->officer->name) ? $this->officer->name : auth()->user()->discord_name;
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
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
        $name = explode(' ', $name);
        switch (get_setting('officer_name_format')) {
            case 'F. Last':
                $formatted_name = substr($name[0], 0, 1).'. '.$name[1];
                break;

            case 'First Last':
                $formatted_name = $name[0].' '.$name[1];
                break;

            case 'First L.':
                $formatted_name = $name[0].' '.substr($name[1], 0, 1).'.';
                break;

            default:
                $formatted_name = substr($name[0], 0, 1).'. '.$name[1];
                break;
        }

        return $formatted_name;
    }
}
