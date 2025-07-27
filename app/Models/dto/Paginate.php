<?php

namespace App\Models\dto;

use Illuminate\Http\Request;

class Paginate
{
    private int $page;
    private int $limit;
    private string $code;
    private bool $withDividendos;

    public function __construct(Request $request)
    {
        $this->limit = $request->input('limit', 20);
        $this->page = $request->input('page', 1);
        $this->code = $request->input('codigo');
        $this->withDividendos = $request->boolean('dividendos');
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getWithDividendos(): bool
    {
        return $this->withDividendos;
    }
}
