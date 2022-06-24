<?php

namespace App\Visitable\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait FiltersByPopularityTimeframe
{
    public function scopePopularAllTime(Builder $query)
    {
        $query->withTotalVisitCount()->orderByDesc('visits_count_total');
    }
}
