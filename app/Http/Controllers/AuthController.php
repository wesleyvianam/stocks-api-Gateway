<?php

namespace App\Http\Controllers;

use App\Models\RequestCount;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AuthController extends Controller
{
    public function __construct(protected readonly AuthService $authService)
    {
    }

    public function register(Request $request)
    {
        $user = $this->authService->register($request);

        return response($user, 201);
    }

    public function login(Request $request)
    {
        return $this->authService->authenticate($request);
    }

    public function requestCount(Request $request) {
        $user = $request->user();
        $reference = date('Y-m');

        return RequestCount::query()->select(['reference', 'count'])->where('user_id', $user->id)->where('reference', $reference)->first();
    }
}
