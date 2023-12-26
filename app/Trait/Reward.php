<?php
namespace App\Trait;

use App\Models\Score;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Tax;
trait Reward{
    function firstScribe($pricepakage) {

        if(Auth::user()->subscribed){ // or == true or === 1
            User::findOrFail(Auth::user()->id)->update(['subscribed'=>0]);
            $id1 = User::with('scores')->findOrFail(Auth::user()->user_id); //12%
            $id2 = User::with('scores')->findOrFail($id1->user_id);//6%
            $id3= User::with('scores')->findOrFail($id2->user_id);//3%
            if($id1)
            Score::findOrFail($id1->scores->id)->update([
                'score'=>$id1->scores->score + $pricepakage *(Tax::tax[3] /100),
            ]);
            if(isset($id2))
            Score::findOrFail($id2->scores->id)->update([
                'score'=>$id1->scores->score + $pricepakage *(Tax::tax[3] /200),
            ]);
            if (isset($id3))
            Score::findOrFail($id3->scores->id)->update([
                'score'=>$id1->scores->score + $pricepakage *(Tax::tax[3] /400),
            ]);
        }
      return 1;
    }
}

