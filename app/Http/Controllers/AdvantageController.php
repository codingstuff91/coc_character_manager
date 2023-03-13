<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Family;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advantages = Advantage::query()
            ->orderBy('name', 'asc')
            ->get();

        return Inertia::render('Admin/Advantage/Index', [
            'advantages' => $advantages,
        ]);
    }

    public function indexByFamily(Family $family)
    {
        return $family->advantages;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Advantage/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Advantage::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('advantages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function edit(Advantage $advantage)
    {
        return Inertia::render('Admin/Advantage/Edit', [
            'advantage' => $advantage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advantage $advantage)
    {
        $advantage->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('advantages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advantage $advantage)
    {
        $advantage->delete();

        return to_route('advantages.index');
    }
}
