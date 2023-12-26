<?php

namespace App\Models;

use App\Trait\StatusCountry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory, StatusCountry;
    protected $guarded = [];
}
