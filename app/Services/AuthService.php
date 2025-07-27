<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthService
{
    public function __construct(protected readonly AuthRepository $authRepository)
    {
    }

    public function register(Request $request): User
    {
        // TODO: Adicionar Validação No RequestValidate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
