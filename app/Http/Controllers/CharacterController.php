<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CharacterController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $characters = $user->characters;

        return Inertia::render('Character/CharacterIndex', [
            'characters' => $characters
        ]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Character $character)
    {
        $character = Character::with([
            'attributes',
            'profile',
            'advantage',
            'weapons'
        ])->where('id', $character->id)->get()->first();

        $capacities = $character->capacities()
            ->orderBy('level')
            ->get()
            ->groupBy('name');

        return Inertia::render('Character/CharacterShow', [
            'character'  => $character,
            'capacities' => $capacities
        ]);
    }

    public function associate()
    {
        $characters = Character::all();
        $users = User::all();

        return Inertia::render('Character/Associate', [
            'characters' => $characters,
            'users'      => $users
        ]);
    }

    public function associateToUser(Request $request, Character $character, User $user)
    {
        $character->users()->attach($user);
    }
}
