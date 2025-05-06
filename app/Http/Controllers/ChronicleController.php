<?php

namespace App\Http\Controllers;

use App\Models\Chronicle;

class ChronicleController extends Controller
{
    public function show(Chronicle $chronicle)
    {
        $characters = $chronicle->characters;

        return inertia('Chronicle/Show', [
            'characters' => $characters,
        ]);
    }
}
