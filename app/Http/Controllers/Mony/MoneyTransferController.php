<?php

namespace App\Http\Controllers\Mony;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Score;
use App\Models\TransferMony;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Trait\Reward;
class MoneyTransferController extends Controller
{
     use Reward;
    public function show(){
        $moneyTransfer= TransferMony::where('user_id', Auth::user()->id)->OrWhere('resive_user_id', Auth::user()->id)->get();
// return view()
    }
    public function showAll(){
        $moneyTransfer= TransferMony::with('usersend')->get();
// return view()
    }
public function MoneyTransfer(Request $request){
     $this->validate(request(), [
            'CodInvention' => 'required|exists:users,code_invention',
            'Mony' => 'required|numeric',
            'Monydiscount' => 'required|numeric'
        ]);
    
    // request variable
    //
    //
    // Mony
    // CodInvention
    //
    //
    //end request  variable
        $score= Score::where('user_id', Auth::user()->id)->first();

    if ($score->score > $request->Mony+$score->freezing_money){
        try{
            $this->Reward();
                $userTransfer = User::where('code_invention', $request->CodInvention)->first();
                $userTransfer->update(['score'=> $score->score - $request->Mony]);
                $transMony=  Score::where('user_id', $userTransfer->id)->first();
                $transMony->update(['score'=> $transMony->score + $request->Monydiscount ]);
                $score->update(['score' => $score->score - $request->Mony]);
                $notification= Notification::create(['user_id'=>auth()->user()->id,]);
                TransferMony::create([
                     'mony_send' => $request->Mony,
                    'user_id' => Auth::user()->id,
                    'resive_user_id' => $userTransfer->id,
                    'mony_resive' => $request->Monydiscount,
                    'notification_id'=> $notification->id,
                    'mony_after_discount'=> $request->Monydiscount,
                ]);
            }catch(\Exception $e){
                return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
            }
            toastr()->success(`The amount $request->Mony be transferred has been successfully transferred`);
            return redirect()->back();
    }
        toastr()->error(`You cannot transfer this amount $request->Mony`);
        return redirect()->back();
}
public function todayProfit($value){

 Score::findOrFail(2)->update([
            'freezing_money'=>15,
 ]);

//  User::find(Auth::user()->id)->update([
//     ''
//  ]);
    return 1;
}
}
