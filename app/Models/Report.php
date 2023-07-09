<?php

namespace App\Models;

use App\Models\Cad\Call;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
