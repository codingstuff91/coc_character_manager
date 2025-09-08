<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CharacterAttributeRepository
{
    public function getConstitutionModificator(int $characterId): int
    {
        return DB::table('attribute_character')
            ->where('attribute_id', 3)
            ->where('character_id', $characterId)
            ->first()
            ->modificator ?? 0;
    }

    public function getLifeDiceValue(int $characterId): int
    {
        return DB::table('attribute_character')
            ->where('attribute_id', 13)
            ->where('character_id', $characterId)
            ->first()
            ->modificator ?? 0;
    }

    public function updateHealthPoints(int $characterId, int $healthPoints): void
    {
        DB::table('attribute_character')
            ->where('attribute_id', 15)
            ->where('character_id', $characterId)
            ->update([
                'value' => $healthPoints,
            ]);
    }
}
