<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::query()
            ->orderBy('name', 'asc')
            ->get();

        return Inertia::render('Admin/Attribute/Index', [
            'attributes' => $attributes,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Attribute/Create');
    }

    public function store(Request $request)
    {
        Attribute::create([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return to_route('attributes.index');
    }

    public function edit(Attribute $attribute)
    {
        return Inertia::render('Admin/Attribute/Edit', [
            'attribute' => $attribute,
        ]);
    }

    public function update(Request $request, Attribute $attribute)
    {
        $attribute->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return to_route('attributes.index');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return to_route('attributes.index');
    }
}
