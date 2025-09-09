<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use App\Models\Advantage;
use App\Models\Character;
use App\Models\Chronicle;
use App\Models\Family;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class)->in('Feature');
uses(TestCase::class, RefreshDatabase::class)->in('Unit');

function createUser(): User
{
    return User::factory()->create();
}

function createCharacter(?User $user = null): Character
{
    $player = $user ?? User::factory()->create();

    $family = Family::factory()->create();
    $profile = Profile::factory()->for($family)->create();
    $advantage = Advantage::factory()->for($family)->create();
    $chronicle = Chronicle::factory()->for($player)->create();

    return Character::factory()->for($chronicle)->create();
}
