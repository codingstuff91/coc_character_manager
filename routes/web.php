<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CapacityController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CharacterCreateController;
use App\Http\Controllers\CharacterProfileController;
use App\Http\Controllers\CharacterWayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeaponController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function() {
    return Inertia::render('Welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('characters', App\Http\Controllers\CharacterController::class)->only('index', 'show');
    Route::post('character/{character}/attribute/{attribute}', [CharacterController::class, 'update_attribute'])->name('character.update_attribute');

    Route::middleware('admin')->group(function() {
        Route::prefix('admin')->group(function() {
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');
            Route::resource('/attributes', AttributeController::class);
            Route::resource('/capacities', CapacityController::class);
            Route::resource('/advantages', AdvantageController::class);
            Route::resource('/profiles', CharacterProfileController::class);
            Route::resource('/weapons', WeaponController::class);
            Route::get('weapons/{weapon}/choose', [WeaponController::class, 'choose']);
            Route::post('weapons/{weapon}/give/{character}', [WeaponController::class, 'give']);
            Route::resource('/character_ways', CharacterWayController::class);
        });

        Route::prefix('character')->group(function() {
            Route::get('/associate', [CharacterController::class, 'associate'])->name('character.associate');
            Route::post('/associate/{character}/user/{user}', [CharacterController::class, 'associateToUser']);
            Route::get('/create', [CharacterCreateController::class, 'create'])->name('character.create');
            Route::post('/save', [CharacterCreateController::class, 'store'])->name('character.store');
        });

        Route::get('advantages/{family}/index', [AdvantageController::class, 'indexByFamily']);
        Route::get('profiles/{family}/index', [CharacterProfileController::class, 'indexByFamily']);
        Route::get('profiles/{profile}/character_ways', [CharacterProfileController::class, 'getCharacterWays']);
    });
});

require __DIR__.'/auth.php';
