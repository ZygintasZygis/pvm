<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use JsonException;
use App\Models\User;

/**
 * Class RedirectAfterLogin
 * @package App\Http\Middleware
 */
class RedirectAfterLogin
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
        $response = $next($request);

        if (auth()->user()) {
            if ((new User())->isUserAdministrator()) {
                return redirect()->route('admin.index');
            }

            if ((new User())->isUserAccountant()) {
                return redirect()->route('accountant.index');
            }

            if ((new User())->isUserClient()) {
                return redirect()->route('client.index');
            }

            return redirect()->route('home');
        }

        return $response;
    }
}
