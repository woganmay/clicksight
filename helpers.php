<?php

if (! function_exists('getServiceUser')) {
    function getServiceUser(bool $createIfMissing = false): \App\Models\User
    {

        $serviceUserPayload = [
            'name' => 'Service User',
            'email' => 'service@clicksight',
            'password' => bcrypt(Illuminate\Support\Str::random()),
        ];

        try {

            $serviceUser = \App\Models\User::where('email', 'service@clicksight')->first();

            if ($serviceUser !== null) {
                return $serviceUser;
            }

            if (! $createIfMissing) {
                throw new \App\Exceptions\ServiceUserMissing();
            }

            return \App\Models\User::create($serviceUserPayload);

        } catch (Exception $exception) {

            // Pass this one through, we're counting on this exception further up
            if (get_class($exception) == \App\Exceptions\ServiceUserMissing::class) {
                throw $exception;
            }

            // Creating to the database failed, but there are other mechanisms
            // for handling a failing DB, so we'll return a mock object here.
            return (new \App\Models\User())->fill($serviceUserPayload);
        }
    }
}

if (!function_exists('cs')) {
    function cs() : \App\Services\Clicksight
    {
        return app(\App\Services\Clicksight::class);
    }
}
