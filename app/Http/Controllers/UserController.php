<?php

namespace App\Http\Controllers;

use App\Models\RequestCount;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setPlan(User $user, Request $request) {
        $user->update([
            'plan_id' => $request->get('plan_id') ?? null,
        ]);

        $user->save();

        return response(status: 204);
    }

    public function requestCount(User $user) {
        $reference = date('Y-m');

        return RequestCount::query()->select(['reference', 'count'])
            ->where('user_id', $user->id)
            ->where('reference', $reference)
            ->first();
    }
}
