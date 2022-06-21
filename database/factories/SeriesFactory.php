<?php

namespace Database\Factories;

use App\Models\Series;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeriesFactory extends Factory
{
    protected $model = Series::class;

    public function definition(): array
    {
        return [
            'title' => $title = $this->faker->sentence(),
            'slug' => Str::slug($title)
        ];
    }
}
