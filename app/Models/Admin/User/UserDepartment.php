<?php

namespace App\Models\Admin\User;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDepartment extends Model
{
    use HasFactory, softDeletes;

    public $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
