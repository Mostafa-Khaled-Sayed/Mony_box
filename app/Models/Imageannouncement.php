<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageannouncement extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function announcement()
    {
        return $this->belongsTo(announcement::class, 'announcement_id', 'id');
    }
}
