<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register your global middleware here (if any)
        // For example, to add the CORS middleware:
        $middleware->append(\Illuminate\Http\Middleware\HandleCors::class);
        $middleware->alias([
            'user.type' => \App\Http\Middleware\CheckUserType::class,
        ]);

        // If you need to modify the 'web' or 'api' middleware groups:
        $middleware->web(append: [
            // Additional web middleware
        ]);

        $middleware->api(append: [
            // Additional api middleware
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Configure exception handling
    })
    ->create();
