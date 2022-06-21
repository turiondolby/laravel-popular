<?php

namespace App\Models;

use App\Visitable\Visitable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;
    use Visitable;
}
