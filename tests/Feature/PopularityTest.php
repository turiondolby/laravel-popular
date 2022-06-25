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

it('gets popular records between two dates', function () {
    $series = Series::factory()->times(2)->create();

    Carbon::setTestNow(Carbon::createFromDate(1989, 11, 16));
    $series[0]->visit();

    Carbon::setTestNow();
    $series[0]->visit();
    $series[1]->visit();

    $series = Series::popularBetween(Carbon::createFromDate(1989, 11, 15), Carbon::createFromDate(1989, 11, 17))->get();

    expect($series->count())->toEqual(1)
        ->and($series[0]->visit_count)->toEqual(1);
});

it('gets popular records for the last x days', function () {
    $series = Series::factory()->times(2)->create();

    Carbon::setTestNow(now()->subDays(4));
    $series[0]->visit();

    Carbon::setTestNow();
    $series[1]->visit();

    $series = Series::popularLastDays(2)->get();

    expect($series->count())->toEqual(1);
});
