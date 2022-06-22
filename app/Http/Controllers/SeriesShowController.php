<?php

namespace App\Http\Controllers;

use App\Models\Series;

class SeriesShowController extends Controller
{
    public function __invoke(Series $series)
    {
        $series->visit();

        return view('series.show', compact('series'));
    }
}
