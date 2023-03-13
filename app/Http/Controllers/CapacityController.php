<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Capacity;
use App\Models\CharacterWay;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capacities = Capacity::query()
            ->with('characterWay')
            ->orderBy('name','asc')
            ->get();

        return Inertia::render('Admin/Capacity/Index', [
            'capacities' => $capacities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $characterWays = CharacterWay::oldest('name')->get();

        return Inertia::render('Admin/Capacity/Create', [
            'characterWays' => $characterWays,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Capacity::create([
            'name' => $request->name,
            'level' => $request->level,
            'description' => $request->description,
            'character_way_id' => $request->characterWay,
        ]);

        return to_route('capacities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Capacity  $capacity
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacity $capacity)
    {
        return Inertia::render('Admin/Capacity/Edit', [
            'capacity' => $capacity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Capacity  $capacity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capacity $capacity)
    {
        $capacity->update([
            'name'        => $request->name,
            'level'       => $request->level,
            'description' => $request->description,
        ]);

        return to_route('capacities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Capacity  $capacity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capacity $capacity)
    {
        $capacity->delete();

        return to_route('capacities.index');
    }
}
