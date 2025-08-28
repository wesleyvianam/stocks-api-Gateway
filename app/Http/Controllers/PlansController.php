<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PlansController extends Controller
{
    public function index(): Collection
    {
        return Plan::all();
    }

    public function show(Plan $plan): Plan
    {
        return $plan;
    }

    public function store(Request $request): Plan
    {
        $req = $request->all();

        $plan = Plan::create([
            'title' => $req['title'],
            'value' => $req['value'],
            'rules' => json_encode($req['rules']),
        ]);

        return $plan;
    }

    public function update(Plan $plan, Request $request): Plan
    {
        $req = $request->all();
        $plan->update([
            'title' => $req['title'],
            'value' => $req['value'],
            'rules' => json_encode($req['rules']),
            'description' => isset($req['description']) ? json_encode($req['description']) : null,
            'stripe' => isset($req['stripe']) ? json_encode($req['stripe']) : null,
        ]);

        return $plan;
    }
}
