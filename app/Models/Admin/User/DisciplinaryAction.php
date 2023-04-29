<?php

namespace App\Models\Admin\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisciplinaryAction extends Model
{
    use HasFactory, softDeletes;

    public $fillable = [
        'receiver_id',
        'giver_id',
        'disciplinary_action',
        'disciplinary_action_type_id',
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
