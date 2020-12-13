<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // $this->mapApiRoutes();
        $this->mapApiV1Routes();
        $this->mapAmaRoutes();
        $this->mapAdminRoutes();
        $this->mapWebRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api-dev')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapApiV1Routes()
    {
        Route::prefix('api/v1')
            ->middleware('web')
            ->namespace('App\Http\Controllers\Api')
            ->group(base_path('routes/api-v1.php'));
    }

    protected function mapAmaRoutes()
    {
        Route::prefix('api/ama')
            ->middleware('web')
            ->namespace('App\Http\Controllers\Ama')
            ->group(base_path('routes/ama.php'));
    }


    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'auth', 'admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }
}