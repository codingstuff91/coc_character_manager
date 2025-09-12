<?php

namespace Tests\Feature\Leveling;

use App\Enums\AttributeEnum;
use App\Models\Character;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\post;

test('it_can_increase_the_character_health_points', function () {
    $this->seed();

    $character = Character::first();
    $user = createUser();

    $this->actingAs($user);

    post(route('level-up.confirm_health', $character), [
        'character_id'  => $character->id,
        'healthPoints' => 5,
    ]);

    $characterHealthPoints = DB::table('attribute_character')
        ->where('attribute_id', AttributeEnum::HEALTH_POINTS_MAX->value)
        ->where('character_id', $character->id)
        ->first()
        ->value;

    expect($characterHealthPoints)->toBe(15);
});
