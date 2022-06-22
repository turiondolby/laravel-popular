<?php

use App\Models\Series;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a visit', function () {
    $series = Series::factory()->create();

    $series->visit();

    expect($series->visits->count())->toBe(1);
});
