<?php

namespace Modules\User\app\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\User\app\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
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
        $module = 'User';
        $route = module_path($module, '/routes/web.php');

        // Tenancy Central domains (web)
        $tenancy_central_domains = config('tenancy.central_domains');

        if ($tenancy_central_domains) {
            foreach ($tenancy_central_domains as $domain) {
                Route::middleware('web')->domain($domain)->group($route);
            }
        } else {
            Route::middleware('web')->group($route);
        }

        // Tenants route (web)
        if (file_exists($tenant_web_route = module_path($module, '/routes/web.tenant.php'))) {
            Route::middleware([
                'web',
                InitializeTenancyByDomainOrSubdomain::class,
                PreventAccessFromCentralDomains::class,
            ])->group($tenant_web_route);
        }
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
        $module = 'User';
        $route = module_path($module, '/routes/api.php');

        // Tenancy Central domains (api)
        $tenancy_central_domains = config('tenancy.central_domains');

        if ($tenancy_central_domains) {
            foreach ($tenancy_central_domains as $domain) {
                Route::prefix('api')->middleware('api')->domain($domain)->group($route);
            }
        } else {
            Route::prefix('api')->middleware('api')->group($route);
        }

        // Tenant route (api)
        if (file_exists($tenant_api_route = module_path($module, '/routes/api.tenant.php'))) {
            Route::prefix('api')->middleware('api')->group($tenant_api_route);
        }
    }
}
