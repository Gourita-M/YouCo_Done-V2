<?php

use App\Models\Restaurants;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use tests\testCase;

uses(RefreshDatabase::class);
uses(Tests\TestCase::class);


test('restaurant can be created', function () {
    $user = User::factory()->create();

    $restaurant = Restaurants::create([
        'name' => 'Big Baby Ma7laba',
        'city' => 'SAFI',
        'cuisine_type' => 'Moroccan',
        'adress' => '22 Rue Gha Qu Ka',
        'capacity' => 20,
        'openhours' => '10:00:00',
        'closehours' => '22:00:00',
        'users_id' => $user->id,
    ]);

    expect($restaurant->name)->toBe('Big Baby Ma7laba');
    
});
