<?php

namespace App\Http\Controllers;

use App\Models\Series;

class SeriesShowController extends Controller
{
    public function __invoke(Series $series)
    {
        $series->visits()->create([
            'data' => [
                'test' => true
            ]
        ]);

        return view('series.show', compact('series'));
    }
}
