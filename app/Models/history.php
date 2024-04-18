<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $fillable = [
        'module_id',
        'history_measurement_date',
        'history_measurement_value',
        'history_state',
        'data_sent',
        'operating_time'
    ];

    protected $dates = [
        'history_measurement_date',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($history) {
            $random_hours = str_pad(rand(0, 23), 2, "0", STR_PAD_LEFT); 
            $random_minutes = str_pad(rand(0, 59), 2, "0", STR_PAD_LEFT);
            $random_seconds = str_pad(rand(0, 59), 2, "0", STR_PAD_LEFT);
            $random_time = $random_hours . ':' . $random_minutes . ':' . $random_seconds;
            $history->operating_time = $random_time;
        });
    }
}
