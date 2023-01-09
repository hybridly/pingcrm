<?php

namespace App\Http\Middleware;

use App\Data\CurrentUserData;
use App\Data\SharedData;
use Hybridly\Http\Middleware;
use Illuminate\Support\Facades\Route;

class HandleHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share(): SharedData
    {
        return SharedData::from([
            'security' => [
                'user' => CurrentUserData::optional(auth()->user()),
            ],
            'currentRoute' => Route::currentRouteName(),
            'locale' => app()->getLocale(),
        ]);
    }
}
