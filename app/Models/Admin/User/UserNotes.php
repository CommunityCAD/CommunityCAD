<?php

namespace App\Models\Admin\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotes extends Model
{
    use HasFactory, softDeletes;

    public $fillable = [
        'receiver_id',
        'giver_id',
        'note',
    ];

    public function giver_user()
    {
        return $this->hasOne(User::class, 'id', 'giver_id');
    }

    public function receiver_user()
    {
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }
}
