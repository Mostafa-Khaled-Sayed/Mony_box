<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lwwcas\LaravelCountries\Models\Country;

class Wallet extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
