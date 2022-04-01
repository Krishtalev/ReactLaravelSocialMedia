<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use ReflectionClass;
use App\Models;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exceptions\CustomException;

class ExistenceMiddleware
{
    /**
     * Checks structure of incoming request
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $routeParams = $request->route()[2];
        $modelName = ucfirst($routeParams['model']);
        $methodName = $routeParams['methodName'];
        $id = isset($routeParams['id']) ? $request->route()[2]['id'] : null;

        throw_if(!class_exists("\App\Models\\$modelName"), new CustomException("Model does not exist", 404));
        $modelClass = "\App\Models\\$modelName";

        $classRules = $modelClass::getMethods();
        throw_if(!in_array($methodName,array_keys($classRules)), new CustomException("Method does not exist", 404));

        $methodType = $classRules[$methodName]['type'];
        throw_if(!($methodType === $request->method()), new CustomException("Wrong request method", 400));

        $idRequired = false;
        $reflectionClass = new ReflectionClass($modelClass);
        $methods = $reflectionClass->getMethods();
        $methodId = array_search($methodName, array_column($methods, 'name'));
        $methodParams = $methods[$methodId]->getParameters();
        foreach ($methodParams as $methodParam) {
            if ($methodParam->name === "id") $idRequired = !$methodParam->isDefaultValueAvailable();
        }
        throw_if($idRequired && is_null($id), new CustomException("Id wasn't provided", 400));

        if ($id) {
            $modelClass = "\App\Models\\$modelName";
            throw_if(!$modelClass::where('id', $id)->exists(), new CustomException("ID does not exist", 404));
        }

        return $next($request);
    }
}
