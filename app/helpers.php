<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

if (!function_exists('get_setting')) {
    function get_setting($setting, $default = "")
    {
        $cad_settings = Cache::remember('cad_settings', 60, function () {
            return DB::table('cad_settings')->get(['name', 'value'])->pluck('value', 'name')->toArray();
        });

        if (!isset($cad_settings[$setting])) {
            return $default;
        }
        if (empty($cad_settings[$setting])) {
            return $default;
        }
        return $cad_settings[$setting];
    }
}
