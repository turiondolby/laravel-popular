<?php

namespace App\Http\Controllers;

use App\Models\Series;

class SeriesShowController extends Controller
{
    public function __invoke(Series $series)
    {
        return view('series.show', compact('series'));
    }
}
