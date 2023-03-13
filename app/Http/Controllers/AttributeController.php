<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::query()
            ->orderBy('name', 'asc')
            ->get();

        return Inertia::render('Admin/Attribute/Index', [
            'attributes' => $attributes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Attribute/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Attribute::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('attributes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return Inertia::render('Admin/Attribute/Edit', [
            'attribute' => $attribute,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $attribute->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return to_route('attributes.index');
    }
}
