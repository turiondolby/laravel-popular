<?php

namespace App\Visitable;

use App\Models\Visit;
use Illuminate\Database\Eloquent\Builder;

trait Visitable
{
    public function visit()
    {
        return new PendingVisit($this);
    }

    public function scopeWithTotalVisitCount(Builder $query)
    {
        $query->withCount('visits as visits_count_total');
    }

    public function visits()
    {
        return $this->morphMany(Visit::class, 'visitable');
    }
}
