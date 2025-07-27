<?php

namespace App\Repositories;

interface AssetsRepositoryInterface
{
    public function findMany($filter);

    public function findOne($code);
}
