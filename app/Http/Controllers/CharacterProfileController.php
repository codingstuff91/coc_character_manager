<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharacterProfileController extends Controller
{
    public function index(): \Inertia\Response
    {
        $profiles = Profile::query()
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Admin/Profile/Index', [
            'profiles' => $profiles,
        ]);
    }

    public function indexByFamily(Family $family): Collection
    {
        return $family->profiles;
    }

    public function getCharacterWays(Profile $profile): Collection
    {
        return $profile->characterWays->each(function($query) {
            return $query->capacities;
        });
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/Profile/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        Profile::create([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return to_route('profiles.index');
    }

    public function edit(Profile $profile): \Inertia\Response
    {
        return Inertia::render('Admin/Profile/Edit', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request, Profile $profile): RedirectResponse
    {
        $profile->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return to_route('profiles.index');
    }

    public function destroy(Profile $profile): RedirectResponse
    {
        $profile->delete();

        return to_route('profiles.index');
    }
}
