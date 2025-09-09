<?php

namespace Tests\Feature\Leveling;

use App\Models\Character;

test('it_can_promote_a_character', function() {
    $user = createUser();
    $character = createCharacter($user);

    $this->actingAs($user);

    $response = $this->get(route('level-up.promotion', $character));

    $expectedNewLevel = $character->level + 1;

    expect($response->status())->toBe(200)
        ->and(Character::first()->can_level_up)->toBe(1)
        ->and(Character::first()->level)->toBe($expectedNewLevel)
        ->and($response->status())->toBe(200);
});
