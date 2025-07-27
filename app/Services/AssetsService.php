<?php

namespace App\Services;

use App\Models\dto\Paginate;
use App\Repositories\AssetsRepository;
use Illuminate\Support\Facades\DB;

class AssetsService
{
    public function __construct(private readonly AssetsRepository $assetsRepository) {
    }

    public function findManyOrFail(Paginate $filter): array
    {
        $assets = $this->assetsRepository->findMany($filter);

        if (empty($assets)) {
            throw new $assets;
        }

        return $assets;
    }
}
