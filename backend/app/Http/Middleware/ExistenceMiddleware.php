<?php

namespace App\Http\Middleware;

use Closure;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exceptions\customException;

class ExistenceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $params = $request->route()->parameters();
        $modelName = $params['model'];
        $methodName = $params['method'];

        throw_if(!class_exists("\App\Models\\$modelName"), new customException("Model does not exist", 404));
        throw_if(!method_exists("\App\Models\\$modelName", $methodName), new customException("Method does not exist", 404));

        return $next($request);
    }
}
