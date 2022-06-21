<?php

namespace App\Http\Controllers;

class SeriesIndexController extends Controller
{
    public function __invoke()
    {
        return view('series.index');
    }
}
