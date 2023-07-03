<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyFirstMiddleware
{
    private $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($this->users->count() > 0) return $response;

        dd('0 usuários');
    }
}
