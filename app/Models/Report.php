<?php

namespace App\Models;

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
        return $this->belongsTo(User::class);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class)->withTrashed();
    }

    public function report_type()
    {
        return $this->belongsTo(ReportType::class)->withTrashed();
    }

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {
                $new_number = date('ymd');
                $number = Report::where('id', 'like', $new_number . '%')->count() + 1;
                $new_number = $new_number . str_pad($number, 3, '0', STR_PAD_LEFT);
                $model->id = $new_number;
            }
        );
    }
}
