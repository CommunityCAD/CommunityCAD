<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Application extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getDepartmentNameAttribute()
    {
        $department_name = Department::where('id', '=', $this->department_id)->first();
        return $department_name->name;
    }

    public function getStatusNameAttribute()
    {
        $status_name = DB::table('application_statuses')->where('id', '=', $this->status)->first();
        return $status_name->name;
    }
}
