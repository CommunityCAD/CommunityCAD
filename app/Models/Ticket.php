<?php

namespace App\Models;

use App\Models\Call;
use App\Models\Civilian\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $casts = [
        'offense_occured_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function civilian()
    {
        return $this->hasOne(Civilian::class, 'id', 'civilian_id')->withTrashed();
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class)->withTrashed();
    }

    public function license()
    {
        return $this->hasOne(License::class, 'id', 'license_id')->withTrashed();
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id')->withTrashed();
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function charges()
    {
        return $this->hasMany(Charges::class);
    }

    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $new_number = date('ymd');
                $number = Ticket::where('id', 'like', $new_number . '%')->count() + 1;
                $new_number = $new_number . str_pad($number, 3, '0', STR_PAD_LEFT);
                $model->id = $new_number;
            }
        );
    }
}
