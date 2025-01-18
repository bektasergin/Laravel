<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global middleware ayarları (hour middleware'ini ekliyoruz)
        $middleware->alias([
            "hour" => \App\Http\Middleware\HourMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Exception handling burada yapılabilir
        // Ancak bu kısmı değiştirmedik, Laravel varsayılan handler kullanacak
    })
    ->create();

