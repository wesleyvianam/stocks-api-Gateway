<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class AssetsRepository implements AssetsRepositoryInterface
{
    public function findMany($filter)
    {
        $query = DB::table('empresa.codigo as c')
            ->select('c.*', 'e.nome as empresa_nome')
            ->leftJoin('empresa.empresa as e', 'e.company_id', '=', 'c.company_id');

        if ($filter->code) $query->where('c.codigo', $filter->code);

        if ($filter->withDividendos) {
//            $query->where(function ($query) {})
        }

        $assets = $query->paginate($filter->limit, page: $filter->page);

        return response()->json([
            'current_page' => $assets->currentPage(),
            'last_page' => $assets->lastPage(),
            'per_page' => $assets->perPage(),
            'total' => $assets->total(),
            'data' => $assets->items(),
        ]);
    }

    public function findOne($code)
    {
        // TODO: Implement findOne() method.
    }
}
