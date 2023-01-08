<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, softDeletes;

    public function getRouteKeyName()
    {
        //slug is a string and this string is the column in your database you created.
        return "slug";
    }
}
