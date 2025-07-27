<?php

namespace App\Repositories;

interface AuthRepositoryInterface
{
    public function register(array $data);

    public function generateToken(array $credentials);

    public function deleteToken(array $credentials);

    public function listTokens();
}
