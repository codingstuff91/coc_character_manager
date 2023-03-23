<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weapons = Weapon::query()
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Admin/Weapon/Index', [
            'weapons' => $weapons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Weapon/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Weapon::create([
            'name'         => $request->name,
            'category'     => $request->category,
            'damage_score' => $request->damage_score,
            'range'        => $request->range,
        ]);

        return to_route('weapons.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function edit(Weapon $weapon)
    {
        return Inertia::render('Admin/Weapon/Edit', [
            'weapon' => $weapon,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weapon $weapon)
    {
        $weapon->update([
            'name'         => $request->name,
            'category'     => $request->category,
            'damage_score' => $request->damage_score,
            'range'        => $request->range,
        ]);

        return to_route('weapons.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function choose(Weapon $weapon)
    {
        $characters = Character::select('id', 'name')->get();

        return Inertia::render('Admin/Weapon/Give', [
            'weapon' => $weapon,
            'characters' => $characters,
        ]);
    }

    public function give(Weapon $weapon, Character $character)
    {
        $character->weapons()->attach($weapon);

        return to_route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weapon $weapon)
    {
        $weapon->delete();

        return to_route('weapons.index');
    }
}
