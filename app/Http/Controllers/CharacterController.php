<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeCharacter;
use App\Models\Character;
use App\Models\User;
use App\Strategies\Character\FetchStrategyFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class CharacterController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $strategy = FetchStrategyFactory::create($user);

        return $strategy->retrieveCharacters($user);
    }

    private function isLinkedToCurrentUser(Character $character): bool
    {
        /** @phpstan-ignore-next-line */
        return $character->users->contains(Auth::user()->id);
    }

    public function show(Character $character): Response
    {
        if (! $this->isLinkedToCurrentUser($character) && ! $this->userIsAdmin()) {
            return abort(403, 'Vous ne pouvez pas consulter ce personnage');
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

    public function associate(): Response
    {
        $characters = Character::all();
        $users = User::all();

        return Inertia::render('Character/Associate', [
            'characters' => $characters,
            'users'      => $users
        ]);
    }

    public function associateToUser(Request $request, Character $character, User $user): RedirectResponse
    {
        $character->users()->attach($user);

        return to_route('admin.index');
    }

    public function update_attribute(Character $character, Attribute $attribute, Request $request): JsonResponse
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
            Storage::delete('avatars/'.$character->avatar);
        }

        /** @phpstan-ignore-next-line */
        $fileName = time().'.'.$request->file('avatar')->getClientOriginalExtension();

        /** @phpstan-ignore-next-line */
        $request->file('avatar')->storeAs('avatars', $fileName);

        $character->avatar = $fileName;
        $character->save();

        return to_route('characters.show', $character->id);
    }
}
