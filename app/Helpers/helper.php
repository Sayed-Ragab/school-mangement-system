<?php


if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        return \Illuminate\Support\Facades\DB::table('settings')
            ->where('key', $key)
            ->value('value') ?? $default;
    }
}


if (!function_exists('get_logo_url')) {
    function get_logo_url()
    {
        $logoName = get_setting('logo'); // e.g., "logo.png"
        $logoPath = public_path('attachments/logo/' . $logoName);

        if ($logoName && file_exists($logoPath)) {
            return asset('attachments/logo/' . $logoName);
        }

        return asset('assets/images/logo-dark.png');
    }
}





