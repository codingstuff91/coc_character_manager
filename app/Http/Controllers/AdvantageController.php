<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Family;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdvantageController extends Controller
{
    public function index(): \Inertia\Response
    {
        $advantages = Advantage::query()
            ->orderBy('name', 'asc')
            ->get();

        return Inertia::render('Admin/Advantage/Index', [
            'advantages' => $advantages,
        ]);
    }

    public function indexByFamily(Family $family): Collection
    {
        return $family->advantages;
    }

    public function create(): \Inertia\Response
    {
        $families = Family::all();

        return Inertia::render('Admin/Advantage/Create', [
            'families' => $families,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Advantage::create([
            'name'        => $request->name,
            'family_id'   => $request->family_id,
            'description' => $request->description,
        ]);

        return to_route('advantages.index');
    }

    public function edit(Advantage $advantage): \Inertia\Response
    {
        return Inertia::render('Admin/Advantage/Edit', [
            'advantage' => $advantage,
        ]);
    }

    public function update(Request $request, Advantage $advantage): RedirectResponse
    {
        $advantage->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return to_route('advantages.index');
    }

    public function destroy(Advantage $advantage): RedirectResponse
    {
        $advantage->delete();

        return to_route('advantages.index');
    }
}
