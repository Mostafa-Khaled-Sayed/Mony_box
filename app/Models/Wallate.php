<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallate extends Model
{
    use HasFactory;
    protected $fillable=['phone','password', 'user_id', 'address'];
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
     protected $hidden = [
        'password', 
    ];
    
}
