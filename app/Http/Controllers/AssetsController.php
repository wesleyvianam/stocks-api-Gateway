<?php

namespace App\Http\Controllers;

use App\Models\dto\Paginate;
use App\Services\AssetsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetsController extends Controller
{
    public function __construct(
        private readonly AssetsService $assetsService,
    ) {
    }

    public function index(Request $request)
    {
        $filter = new Paginate($request);
        $assets = $this->assetsService->findManyOrFail($filter);

        return response()->json($assets);
    }
}
