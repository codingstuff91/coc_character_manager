<?php

namespace Tests\Unit;

use App\Actions\Character\DefineLuckPointsAttributeAction;
use App\Enums\FamilyEnum;
use PHPUnit\Framework\TestCase;

class DefineLuckPointsActionTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideFamiliesForBonusScores
     */
    public function it_defines_the_correct_bonus_points($expectedResult, $input)
    {
        $mainActionClass = new DefineLuckPointsAttributeAction();

        $bonusPointsScore = $mainActionClass->defineFamilyBonusPoints($input);

        $this->assertEquals($expectedResult, $bonusPointsScore);
    }

    public function provideFamiliesForBonusScores()
    {
        return [
            [
                2,
                ['id' => FamilyEnum::ACTION->value]
            ],
            [
                4,
                ['id' => FamilyEnum::ADVENTURE->value]
            ],
            [
                2,
                ['id' => FamilyEnum::REFLEXION->value]
            ]
        ];
    }

    /**
     * @test
     * @dataProvider provideDataForLuckPointsScore
     */
    public function it_calculates_the_total_luck_points_scores($expectedResult, $input)
    {
        $mainActionClass = new DefineLuckPointsAttributeAction();

        $totalLuckPoints = $mainActionClass->calculateLuckPointsScore($input[0]['charisma']['modificator'], $input[1]['bonus_points']);

        $this->assertEquals($expectedResult, $totalLuckPoints);

    }

    public function provideDataForLuckPointsScore()
    {
        return [
            [
                4,
                [
                    ['charisma' => ['modificator' => 2]],
                    ['bonus_points' => 2]
                ]
            ],
            [
                6,
                [
                    ['charisma' => ['modificator' => 3]],
                    ['bonus_points' => 3]
                ]
            ],
        ];
    }
}
