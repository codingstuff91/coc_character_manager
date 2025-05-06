<?php

namespace App\Strategies\Character;

use App\Models\Character;
use App\Models\Chronicle;
use Illuminate\Contracts\Auth\Authenticatable;
use Inertia\Inertia;

class PlayerFetchCharacterStrategy implements FetchCharacterInterface
{
    public function retrieveCharacters(Authenticatable $user)
    {
        if ($this->playerHasOnlyOneCharacter($user)) {
            $character = $user->characters->first();

            return to_route('characters.show', $character);
        }

        return $this->fetchChronicles($user);
    }

    private function playerHasOnlyOneCharacter(Authenticatable $user)
    {
        return $user->characters->count() === 1;
    }

    private function fetchChronicles(Authenticatable $user)
    {
        $chronicles = Chronicle::query()
            ->whereHas('characters', function($query) use ($user) {
                $query->whereHas('users', function($query) use ($user) {
                    $query->where('character_user.user_id', $user->id);
                });
            })
            ->get();

        return Inertia::render('Chronicle/Index', [
            'chronicles' => $chronicles,
        ]);
    }
}
