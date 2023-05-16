<?php

namespace App\Models\Admin;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory, softDeletes;

    protected $gaurded = [];

    public function poster_user()
    {
        return $this->hasOne(User::class, 'id', 'poster_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class);
    }
}
