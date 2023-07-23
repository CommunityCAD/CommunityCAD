<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PenalCodeTitle extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public function penal_code_codes()
    {
        $penal_codes = Cache::remember('penal_codes', '2', function () {
            // return DB::table('penal_codes')->where('deleted_at', '=', null)->get();
            return PenalCode::get();
        });

        return $penal_codes->where('penal_code_title_id', $this->id);
    }
}
