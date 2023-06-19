<?php

namespace App\Models\Cad;

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
}
