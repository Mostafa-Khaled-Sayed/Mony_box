<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datanormale extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function announcements(){

        return $this->belongsToMany(announcement::class,table:'announcement_datanormal');

    }
}
