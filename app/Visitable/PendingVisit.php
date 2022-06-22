<?php

namespace App\Visitable;

use Illuminate\Database\Eloquent\Model;

class PendingVisit
{
    protected $model;
    protected $attributes = [];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function __destruct()
    {
        $this->model->visits()->create([
            'data' => $this->attributes
        ]);
    }
}
