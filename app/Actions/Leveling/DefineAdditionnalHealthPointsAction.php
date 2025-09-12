<?php

namespace App\Actions\Leveling;

use App\Models\Character;
use App\Repositories\CharacterAttributeRepository;
use App\Services\DiceRoller;
use Illuminate\Support\Facades\DB;

class DefineAdditionnalHealthPointsAction
{
    public function __construct(
        public CharacterAttributeRepository $characterRepository,
        public DiceRoller $diceRoller
    ) {
    }

    public function execute(Character $character): int
    {
        $lifeDice = $this->characterRepository->getLifeDiceValue($character);

        if ($this->levelIsEven($character->level)) {
            return $this->diceRoller->roll($lifeDice);
        }

        $constitutionModificator = $this->characterRepository->getConstitutionModificator($character->id);

        if ($constitutionModificator < 0) {
            return 0;
        }

        return 1;
    }

    private function levelIsEven(int $characterLevel): bool
    {
        return $characterLevel % 2 === 0;
    }
}
