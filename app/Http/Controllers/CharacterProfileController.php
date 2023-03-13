<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Family;
use App\Models\Profile;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharacterProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::query()
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Admin/Profile/Index', [
            'profiles' => $profiles,
        ]);
    }

    public function indexByFamily(Family $family)
    {
        return $family->profiles;
    }

    public function getCharacterWays(Profile $profile)
    {
        return $profile->characterWays->each(function($query){
            return $query->capacities;
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Profile/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Profile::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('profiles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return Inertia::render('Admin/Profile/Edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return to_route('profiles.index');
    }
}
