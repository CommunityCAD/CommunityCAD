<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

if (!function_exists('get_setting')) {
    function get_setting($setting_name, $default = '')
    {
        // $cad_settings = Cache::get('key', 'default');('cad_settings', 5, function () {
        //     return DB::table('cad_settings')->get(['name', 'value'])->pluck('value', 'name')->toArray();
        // });

        $cad_settings = Cache::get('cad_settings', function () {
            return DB::table('cad_settings')->get(['name', 'value', 'type']);
        });

        $settings = [];

        foreach ($cad_settings as $setting) {
            if ($setting->type == 'bool') {
                $settings[$setting->name] = filter_var($setting->value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            } else {
                $settings[$setting->name] = $setting->value;
            }
        }

        if (!isset($settings[$setting_name])) {
            return $default;
        }

        if (empty($settings[$setting_name])) {
            return $default;
        }

        return $settings[$setting_name];
    }
}
