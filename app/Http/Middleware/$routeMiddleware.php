rotected $routeMiddleware = [
   'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
   'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
   'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
   'userAuth' => \Illuminate\Routing\Middleware\UserAuthRequests::class,
];
public function handle($request, Closure $next, $profile)
   {
       if (! $request->user()->hasProfile($profile)) {
           // Next page
       }
       return $next($request);
   }
}