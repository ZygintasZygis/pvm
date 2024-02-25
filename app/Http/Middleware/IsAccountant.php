<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

/**
 * Class IsAccountant
 * @package App\Http\Middleware
 */
class IsAccountant
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((new User())->isUserAccountant()) {
            return $next($request);
        }

        abort(403, trans('app.errors.403'));
    }
}
