<?php

use Carbon\Carbon;
use App\Models\Series;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('gets the total visit count', function () {
    $series = Series::factory()->create();

    $series->visit();

    $series = Series::withTotalVisitCount()->first();

    expect($series->visits_count_total)->toEqual(1);
});

it('get records by all time popularity', function () {
    Series::factory()->times(2)->create()->each->visit();

    $popularSeries = Series::factory()->create();

    Carbon::setTestNow(now()->subDays(2));
    $popularSeries->visit();

    Carbon::setTestNow();
    $popularSeries->visit();

    $series = Series::latest()->popularAllTime()->get();

    expect($series->count())->toEqual(3)
        ->and($series->first()->visits_count_total)->toEqual(2);
});
