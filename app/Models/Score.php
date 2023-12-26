<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Score extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class,'user_id');

    }
    public function ScopeMainData($query,$id){
        return $query->with('user')->where('id',$id);
            }
}
