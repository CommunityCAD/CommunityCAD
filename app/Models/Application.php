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

    protected $with = ['user', 'department'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function getStatusNameAttribute()
    {
        $status_name = DB::table('application_statuses')->where('id', '=', $this->status)->first();
        return $status_name->name;
    }
}
