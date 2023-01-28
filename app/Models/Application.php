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

        switch ($this->status) {
            case 1:
                return "Pending Review";
                break;
            case 2:
                return "Pending Admin Review";
                break;
            case 3:
                return "Pending Interview";
                break;
            case 4:
                return "Approved";
                break;
            case 5:
                return "Denied";
                break;
            case 6:
                return "Withdrawn";
                break;
        }
    }
}
