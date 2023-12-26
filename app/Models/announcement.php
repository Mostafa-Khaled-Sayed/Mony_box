<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    use HasFactory;
    protected $guarded = [ ];
    public function datanormals(){

        return $this->belongsToMany(Datanormale::class,table:'announcement_datanormal');

    }
    public function users()
    {
                 
        return $this->belongsToMany(User::class, table: 'user_announcement');
    }



    public function imageannouncements()
    {
        return $this->hasMany(Imageannouncement::class,'id');
    }
}
