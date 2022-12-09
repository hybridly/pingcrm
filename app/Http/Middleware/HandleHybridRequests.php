<?php

namespace App\Http\Middleware;

use Hybridly\Http\Middleware;
use Illuminate\Http\Request;

class HandleHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share(Request $request): array
    {
        return [
            //
        ];
    }
}
