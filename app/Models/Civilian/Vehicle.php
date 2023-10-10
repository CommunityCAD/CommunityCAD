<?php

namespace App\Models\Civilian;

use App\Models\Civilian;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'plate',
        'model',
        'color',
        'registration_expire',
        'civilian_id',
        'vehicle_status',
        'impound_ticket_id',
    ];

    protected $casts = [
        'registration_expire' => 'date',
    ];

    public function civilian()
    {
        return $this->belongsTo(Civilian::class);
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'id', 'impound_ticket_id');
    }

    public function getStatusNameAttribute()
    {
        switch ($this->vehicle_status) {
            case 1:
                return 'Valid';
                break;
            case 3:
                return 'Impounded';
                break;
            case 4:
                return 'Booted';
                break;
            case 2:
                return 'Stolen';
                break;
        }
    }
}
