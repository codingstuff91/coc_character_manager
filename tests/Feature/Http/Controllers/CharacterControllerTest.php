<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Character;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CharacterController
 */
class CharacterControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $characters = Character::factory()->count(3)->create();

        $response = $this->get(route('character.index'));
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $character = Character::factory()->create();

        $response = $this->get(route('character.show', $character));

        $response->assertOk();
        $response->assertViewIs('character.show');
        $response->assertViewHas('attribute');
    }
}
