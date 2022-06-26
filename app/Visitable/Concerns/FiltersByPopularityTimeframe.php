<?php

namespace App\Visitable\Concerns;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait FiltersByPopularityTimeframe
{
    public function scopePopularAllTime(Builder $query)
    {
        $query->withTotalVisitCount()->orderByDesc('visits_count_total');
    }

    public function scopePopularLastDays(Builder $query, $days)
    {
        $query->popularBetween(now()->subDays($days), now());
    }

    public function scopePopularBetween(Builder $query, Carbon $from, Carbon $to)
    {
        $query->whereHas('visits', $this->betweenScope($from, $to))
            ->withCount([
                'visits as visit_count' => $this->betweenScope($from, $to)
            ]);
    }

    public function scopePopularLastWeek(Builder $query)
    {
        $query->popularBetween(
            $startOfLastWeek = now()->subDays(7)->startOfWeek(),
            $startOfLastWeek->copy()->endofWeek()
        );
    }

    public function scopePopularThisWeek(Builder $query)
    {
        $query->popularBetween(now()->startOfWeek(), now()->endofWeek());
    }

    protected function betweenScope(Carbon $from, Carbon $to)
    {
        return function ($query) use ($from, $to) {
            $query->whereBetween('created_at', [$from, $to]);
        };
    }
}
