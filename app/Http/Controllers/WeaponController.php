<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Weapon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WeaponController extends Controller
{
    public function index(): \Inertia\Response
    {
        $weapons = Weapon::query()
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Admin/Weapon/Index', [
            'weapons' => $weapons,
        ]);
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/Weapon/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        Weapon::create([
            'name'         => $request->name,
            'category'     => $request->category,
            'damage_score' => $request->damage_score,
            'range'        => $request->range,
        ]);

        return to_route('weapons.index');
    }

    public function edit(Weapon $weapon): \Inertia\Response
    {
        return Inertia::render('Admin/Weapon/Edit', [
            'weapon' => $weapon,
        ]);
    }

    public function update(Request $request, Weapon $weapon): RedirectResponse
    {
        $weapon->update([
            'name'         => $request->name,
            'category'     => $request->category,
            'damage_score' => $request->damage_score,
            'range'        => $request->range,
        ]);

        return to_route('weapons.index');
    }

    public function choose(Weapon $weapon): \Inertia\Response
    {
        $characters = Character::select('id', 'name')->get();

        return Inertia::render('Admin/Weapon/Give', [
            'weapon'     => $weapon,
            'characters' => $characters,
        ]);
    }

    public function give(Weapon $weapon, Character $character): RedirectResponse
    {
        $character->weapons()->attach($weapon);

        return to_route('admin.index');
    }

    public function destroy(Weapon $weapon): RedirectResponse
    {
        $weapon->delete();

        return to_route('weapons.index');
    }
}
