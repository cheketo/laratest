<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Router;
use App\Models\Middleware;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [

        'auth' 						=> \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' 			=> \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' 				=> \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' 						=> \Illuminate\Auth\Middleware\Authorize::class,
        'guest' 					=> \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle'			 	=> \Illuminate\Routing\Middleware\ThrottleRequests::class,

        // 'userexist' 			=> \App\Http\Middleware\UserExist::class,
        // 'checkrole' 			=> \App\Http\Middleware\CheckRole::class,
        // 'checkpermission' => \App\Http\Middleware\CheckPermission::class,
				// 'usercanbeedited' => \App\Http\Middleware\UserCanBeEdited::class,

    ];

		/**
     * Create a new HTTP kernel instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function __construct(Application $app, Router $router)
    {
        $this->app = $app;
        $this->router = $router;

        $router->middlewarePriority = $this->middlewarePriority;

				// $middlewares = Middleware::all();
				//
				// foreach( $middlewares as $middleware )
				// {
				//
				// 		if( !$this->routeMiddleware[ $middleware->name ] )
				// 		{
				//
				// 				$this->routeMiddleware[ $middleware->name ] = $middleware->class;
				//
				// 		}
				//
				// }

        foreach ($this->middlewareGroups as $key => $middleware) {
            $router->middlewareGroup($key, $middleware);
        }

        foreach ($this->routeMiddleware as $key => $middleware) {
            $router->aliasMiddleware($key, $middleware);
        }
    }

}
