<?php

use App\Models\User;
use App\Models\Series;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a visit', function () {
    $series = Series::factory()->create();

    $series->visit();

    expect($series->visits->count())->toBe(1);
});

it('creates a visit with the default ip address', function () {
    $series = Series::factory()->create();

    $series->visit()->withIp();

    expect($series->visits->first()->data)->toMatchArray([
        'ip' => request()->ip()
    ]);
});

it('creates a visit with the given ip address', function () {
    $series = Series::factory()->create();

    $series->visit()->withIp('cats');

    expect($series->visits->first()->data)->toMatchArray([
        'ip' => 'cats'
    ]);
});

it('creates a visit with custom data', function () {
    $series = Series::factory()->create();

    $series->visit()->withData([
        'cats' => true
    ]);

    expect($series->visits->first()->data)->toMatchArray([
        'cats' => true
    ]);
});

it('creates a visit with the default user', function () {
    $this->actingAs($user = User::factory()->create());
    $series = Series::factory()->create();

    $series->visit()->withUser();

    expect($series->visits->first()->data)->toMatchArray([
        'user_id' => $user->id
    ]);
});

it('creates a visit with the given user', function () {
    $user = User::factory()->create();
    $series = Series::factory()->create();

    $series->visit()->withUser($user);

    expect($series->visits->first()->data)->toMatchArray([
        'user_id' => $user->id
    ]);
});
