
protected $routeMiddleware = [
    // Otros middlewares...
    'verificar.rol' => \App\Http\Middleware\VerificarRol::class,
];