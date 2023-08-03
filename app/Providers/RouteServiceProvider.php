<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(routesCallback: function (): void {
            Route::middleware(['web'])
                ->group(callback: base_path(path: 'routes/web.php'));
        });
    }
}
