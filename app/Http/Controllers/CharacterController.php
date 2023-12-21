<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeCharacter;
use App\Models\Character;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class CharacterController extends Controller
{
    /**
     * @return bool
     */
    private function userIsAdmin(): bool
    {
        return Auth::user()->admin;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function index(Request $request): Response
    {
        $user = Auth::user();

        $characters = $this->userIsAdmin() ? Character::all() : $user->characters;

        return Inertia::render('Character/CharacterIndex', [
            'characters' => $characters
        ]);
    }

    /**
     * @param Character $character
     * @return bool
     */
    private function isLinkedToCurrentUser(Character $character): bool
    {
        return $character->users->contains(Auth::user()->id);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Inertia\Response
     */
    public function show(Request $request, Character $character): Response
    {
        if(! $this->isLinkedToCurrentUser($character) && ! $this->userIsAdmin()) {
            return abort(403, "Vous ne pouvez pas consulter ce personnage");
        }

        $character->loadMissing([
            'attributes',
            'profile',
            'advantage',
            'family',
            'weapons',
        ]);

        $capacities = $character->capacities()
            ->with('characterWay')
            ->orderBy('level')
            ->get()
            ->groupBy('character_way_id');

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

        return to_route('admin.index');
    }

    public function update_attribute(Character $character, Attribute $attribute, Request $request)
    {
        AttributeCharacter::where('character_id', $character->id)
            ->where('attribute_id', $attribute->id)
            ->update([
                'value' => $request->newScore,
            ]);

        return response()->json(['message' => 'Mise à jour effectuée']);
    }

    public function upload_avatar(Character $character, Request $request): RedirectResponse
    {
        if ($character->avatar) {
            Storage::delete('avatars/' . $character->avatar);
        }

        $fileName = time() . '.' . $request->file('avatar')->getClientOriginalExtension();

        $request->file('avatar')->storeAs(
            'avatars', $fileName
        );

        $character->avatar = $fileName;
        $character->save();

        return to_route('characters.show', $character->id);
    }
}
