<?php

namespace App\Http\Controllers;

use App\Models\Capacity;
use App\Models\CharacterWay;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CapacityController extends Controller
{
    public function index(): \Inertia\Response
    {
        $capacities = Capacity::query()
            ->with('characterWay')
            ->orderBy('name', 'asc')
            ->get();

        return Inertia::render('Admin/Capacity/Index', [
            'capacities' => $capacities,
        ]);
    }

    public function create(): \Inertia\Response
    {
        $characterWays = CharacterWay::oldest('name')->get();

        return Inertia::render('Admin/Capacity/Create', [
            'characterWays' => $characterWays,
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        Capacity::create([
            'name'             => $request->name,
            'level'            => $request->level,
            'description'      => $request->description,
            'character_way_id' => $request->characterWay,
        ]);

        return to_route('capacities.index');
    }

    public function edit(Capacity $capacity): \Inertia\Response
    {
        return Inertia::render('Admin/Capacity/Edit', [
            'capacity' => $capacity,
        ]);
    }

    public function update(Request $request, Capacity $capacity): \Illuminate\Http\RedirectResponse
    {
        $capacity->update([
            'name'        => $request->name,
            'level'       => $request->level,
            'description' => $request->description,
        ]);

        return to_route('capacities.index');
    }

    public function destroy(Capacity $capacity): \Illuminate\Http\RedirectResponse
    {
        $capacity->delete();

        return to_route('capacities.index');
    }
}
