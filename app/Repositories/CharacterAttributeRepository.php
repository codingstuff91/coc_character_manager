<?php

namespace App\Repositories;

use App\Enums\AttributeEnum;
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

    public function updateHealthPoints(int $characterId, int $additionnalHealthPoints): void
    {
        $characterHealthPoints = DB::table('attribute_character')
            ->where('attribute_id', AttributeEnum::HEALTH_POINTS_MAX->value)
            ->where('character_id', $characterId)
            ->first()
            ->value;

        $characterHealthPoints += $additionnalHealthPoints;

        DB::table('attribute_character')
            ->where('attribute_id', AttributeEnum::HEALTH_POINTS_MAX->value)
            ->where('character_id', $characterId)
            ->update([
                'value' => $characterHealthPoints,
            ]);
    }
}
