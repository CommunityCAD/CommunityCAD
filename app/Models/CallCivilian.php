<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallCivilian extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $with = ['civilian'];

    public function civilian()
    {
        return $this->hasOne(Civilian::class, 'id', 'civilian_id')->without(['licenses', 'medical_records', 'vehicles', 'weapons']);
    }
}
