<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenalCode extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $with = ['penal_code_class'];

    public function penal_code_title()
    {
        return $this->hasOne(PenalCodeTitle::class, 'id', 'penal_code_title_id');
    }

    public function penal_code_class()
    {
        return $this->hasOne(PenalCodeClass::class, 'id', 'penal_code_class_id');
    }
}
