<?php

namespace App\Http\Controllers;

use App\Models\CharacterWay;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharacterWayController extends Controller
{
    public function index(): \Inertia\Response
    {
        $characterWays = CharacterWay::oldest('name')->get();

        return Inertia::render('Admin/CharacterWay/Index', [
            'characterWays' => $characterWays,
        ]);
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/CharacterWay/Create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        CharacterWay::create([
            'name' => $request->name,
        ]);

        return to_route('character_ways.index');
    }
}
