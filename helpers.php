<?php

if (! function_exists('getServiceUser')) {
    function getServiceUser(): \App\Models\User
    {

        $existingServiceUser = \App\Models\User::getByEmail('service@clicksight');

        // Let this throw exceptions further up - we want this to work 100% of the time
        return ($existingServiceUser !== null) ? $existingServiceUser
                                               : \App\Models\User::create([
                                                    'name' => 'Service User',
                                                    'email' => 'service@clicksight',
                                                    'password' => bcrypt(Illuminate\Support\Str::random()),
                                                ]);
    }
}

if (!function_exists('cs')) {
    function cs() : \App\Services\Clicksight
    {
        return app(\App\Services\Clicksight::class);
    }
}
