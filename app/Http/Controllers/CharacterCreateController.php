<?php

namespace App\Http\Controllers;

use App\Actions\Character\AssignMainAttributesValuesAction;
use App\Actions\Character\CreateCharacterGeneralInformationsAction;
use App\Actions\Character\DefineHealthPointsAttributeAction;
use App\Models\Attribute;
use App\Models\Family;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharacterCreateController extends Controller
{
    public function create()
    {
        $families = Family::all();
        $attributes = Attribute::all();

        return Inertia::render('Character/Create/MainForm', [
            'families'   => $families,
            'attributes' => $attributes,
        ]);
    }

    public function store(Request $request)
    {
        $newCharacter = resolve(CreateCharacterGeneralInformationsAction::class)
                        ->execute($request->character['informations']);

        $assignAttributes = resolve(AssignMainAttributesValuesAction::class)
                            ->execute($newCharacter, $request->character['characterAttributes']);

        $healthPointsAttributes = resolve(DefineHealthPointsAttributeAction::class)
            ->execute($newCharacter, $request->character['characterAttributes'], $request->character['family']);

        return $healthPointsAttributes;
    }
}
