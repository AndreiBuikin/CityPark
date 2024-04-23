<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiUserHasRole
{
    public function handle(Request $request, Closure $next, $roles):Response
    {
        if (!$request->user()->hasRole(explode('|',$roles))){
            throw new ApiException(403,'Доступ запрещен');
        }
        return $next($request);
    }
}
