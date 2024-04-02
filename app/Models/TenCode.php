<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenCode extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public function getCodeTypeAttribute()
    {
        switch ($this->type) {
            case '1':
                return 'All';
                break;
            case '2':
                return 'LEO';
                break;
            case '3':
                return 'Fire/EMS';
                break;
            case '4':
                return 'Phonetic';
                break;

            default:
                return 'Broken';
                break;
        }
    }
}
