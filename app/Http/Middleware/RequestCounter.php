<?php

namespace App\Http\Middleware;

use App\Models\Plan;
use App\Models\RequestCount;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RequestCounter
{
    public function handle(Request $request, Closure $next)
    {
        $reference = date('Y-m');
        /** @var User $user */
        $user = $request->user();
        $plan = Plan::query()->where('id', $user->plan_id)->first();

        $requestCounter = RequestCount::query()
            ->where('user_id', $user->id)
            ->where('reference', $reference)
            ->first();

        if (!$requestCounter) {
            RequestCount::create([
                'user_id' => $user->id,
                'reference' => $reference,
                'count' => 1,
            ]);

            return $next($request);
        }

        if ($plan->request_count <= $requestCounter->count) {
            throw new HttpException(400, 'Você atingiu quantidade máxima de requisições permitidas em seu plano');
        }

        $requestCounter->count += 1;
        $requestCounter->save();

        return $next($request);
    }
}
