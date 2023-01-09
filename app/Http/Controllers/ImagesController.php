<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImagesController extends Controller
{
    public function show(string $path): StreamedResponse
    {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(request()),
            'source' => Storage::disk()->getDriver(),
            'cache' => Storage::disk()->getDriver(),
            'cache_path_prefix' => '.glide-cache',
        ]);

        return $server->getImageResponse($path, request()->all());
    }
}
