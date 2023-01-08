<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentResource extends Model
{
    use HasFactory, softDeletes;

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
