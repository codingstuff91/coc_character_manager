<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Weapon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WeaponController extends Controller
{
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
