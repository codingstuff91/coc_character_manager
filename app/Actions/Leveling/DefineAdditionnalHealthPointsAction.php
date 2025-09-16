<?php

namespace App\Actions\Leveling;

use App\Models\Character;
use App\Repositories\CharacterAttributeRepository;
use App\Services\DiceRoller;

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
        $constitutionModificator = $this->characterRepository->getConstitutionModificator($character->id);
        $additionalHealthPoints = $this->diceRoller->roll($lifeDice);

        if ($this->levelIsEven($character->level)) {
            if ($constitutionModificator < 0) {
                return $additionalHealthPoints + ($constitutionModificator);
            }

            return $additionalHealthPoints;
        }

        if ($constitutionModificator < 0) {
            return 0;
        }

        return $constitutionModificator;
    }

    private function levelIsEven(int $characterLevel): bool
    {
        return $characterLevel % 2 === 0;
    }
}
