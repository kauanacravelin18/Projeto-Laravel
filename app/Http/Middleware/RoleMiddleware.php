<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Verifica se o usuário possui um dos papéis permitidos.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            abort(403, 'Acesso não autorizado.');
        }

        if (!in_array(auth()->user()->role, $roles, true)) {
            abort(403, 'Você não possui permissão para acessar esta área.');
        }

        return $next($request);
    }
}