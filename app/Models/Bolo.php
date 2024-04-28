<?php

namespace App\Models;

use App\Models\Civilian\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bolo extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public function civilian()
    {
        return $this->belongsTo(Civilian::class)->withTrashed();
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function call()
    {
        return $this->belongsTo(Call::class);
    }
}
