<?php

namespace Tests\Feature\Leveling;

use App\Models\Character;

test('it_can_promote_a_character', function() {
    $user = createUser();
    $character = createCharacter($user);

    $this->actingAs($user);

    $response = $this->get(route('level-up.promotion', $character));

    $expectedNewLevel = $character->level + 1;

    expect(Character::first()->level)->toBe($expectedNewLevel);
});
