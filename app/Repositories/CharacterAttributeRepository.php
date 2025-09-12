<?php

namespace App\Repositories;

use App\Models\Character;
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

    public function getLifeDiceValue(Character $character): int
    {
        return $character->family->life_dice_score;
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
