<?php

namespace Tests\Unit;

use App\Actions\Character\DefineDefenseScoreAction;
use PHPUnit\Framework\TestCase;

class DefineDefenseScoreActionTest extends TestCase
{
    /**
     * @test
     */
    public function it_calculates_the_defense_score_correctly()
    {
        $defenseScore = resolve(DefineDefenseScoreAction::class)
                        ->calculateDefenseScore(2);

        $this->assertEquals(12, $defenseScore);
    }
}
