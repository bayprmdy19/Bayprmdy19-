<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// Konfigurasi public path kustom secara dinamis untuk shared hosting / produksi
$publicPathEnv = env('PUBLIC_PATH');
if ($publicPathEnv) {
    if (str_starts_with($publicPathEnv, '..')) {
        $app->usePublicPath(realpath(base_path($publicPathEnv)) ?: base_path($publicPathEnv));
    } else {
        $app->usePublicPath($publicPathEnv);
    }
} elseif (basename(base_path()) === 'laravel-core') {
    $app->usePublicPath(dirname(base_path()));
}

return $app;
