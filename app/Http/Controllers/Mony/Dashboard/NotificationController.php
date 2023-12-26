<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Models\WithdrawOrDepositMoney;
use App\Trait\Reward;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator;

class NotificationController extends Controller
{
    use Reward;
    public function index()
    {

        $datas = Notification::orderBy('id', 'desc')->get();

        return view('admin.Notification.index', compact('datas'));
    }

    public function delete($id)
    {

        Notification::findOrFail($id)->delete();

        toastr()->success('تم حذف الاشعار بنجاح ');
        return redirect()->back();
    } // End Method 
    //جاهزه 

    public function ready($id)
    {

        $withdrow = WithdrawOrDepositMoney::find($id);
        $notification=Notification::findorfail($withdrow->notification_id) ;
       
  
     
        if($withdrow ->stauts_mony != 'جاهزة'){
          

            if ($withdrow->withdraw_money == 0) {

                $user = User::with('scores')->findOrFail($withdrow->user_id);
                $score = Score::where('user_id', $user->id)->first();


                $user->update([
                    'score' => $user->score + $withdrow->deposit_money,
                 
                ]);

                $score->update([
                    'score' => $user->scores->score + $withdrow->deposit_money,
                ]);
              
                $withdrow->update([
                    'stauts_mony' => 'جاهزة',
                    'admin_id' => auth()->user()->id,
                ]);
                Notification::create([
                    'user_id' => $withdrow->user_id,
                    'admin_id' => auth()->user()->id,
                    'type' => 'another',
                    "status" => 'جاهزه',
                    'message' => "نم تحويل الفلوس في حساب العميل"
                ]);
            } else {

                $user = User::with('scores')->findOrFail($withdrow->user_id);
                $score = Score::where('user_id', $user->id)->first();
                if ($user->score >= $withdrow->withdraw_money) {

                    $user->update([
                        'score' => $user->score - $withdrow->deposit_money,
                    ]);
                    $score->update([
                        'score' => $user->scores->score - $withdrow->withdraw_money,
                    ]);
                   
                    $withdrow->update([
                        'stauts_mony' => 'جاهزة',
                        'admin_id' => auth()->user()->id,
                    ]);
                    Notification::create([
                        'user_id' => $withdrow->user_id,
                        'admin_id' => auth()->user()->id,
                        'type' => 'another',
                        "status" => 'جاهزه',
                        'message' => "تم سحب المبلغ بنجاح"
                    ]);
                    toastr()->success('تمت العمليه بنجاح');
                }else{
                     toastr()->error('لا يمكن سحب المبلغ');
                }
             
            }
        
       
        }else {
            toastr()->error('انه مفعله قبل ذالك');
        }
        return redirect()->back();
    }

    //ملغيه
    public function cancel(Request $request)
    {
       
        $request->validate([
           'id'=> 'required',
            'message'=>'required'
        ]);
       
        $withdrow = WithdrawOrDepositMoney::findOrFail($request->id);
        $notification = Notification::findorfail($withdrow->notification_id);
        
        if ($withdrow->stauts_mony != 'ملغية' && $withdrow->stauts_mony == 'جاهزة'  ) {
           
                $user = User::with('scores')->findOrFail($withdrow->user_id);
                $score = Score::where('user_id', $user->id)->first();
                if($user->score >= $withdrow->deposit_money && $withdrow->status == 1){

                $score->update([
                    'score' => $user->scores->score - $withdrow->withdraw_money,
                ]);
              
                $user->update([
                    'score' => $user->score - $withdrow->deposit_money,
                ]);
                $withdrow->update([
                    'stauts_mony' => 'ملغية' ,
                    'admin_id' => auth()->user()->id,
                ]);
                Notification::create([
                    'user_id' => $withdrow->user_id,
                    'admin_id' => auth()->user()->id,
                    'type' => 'another',
                    "status" => 'ملغية',
                    'message' => $request->message,
                ]);
               
                toastr()->success('تمت العمليه بنجاح');
               
                return back();
            }elseif( $withdrow->status == 0){
                $score->update([
                    'score' => $user->scores->score + $withdrow->withdraw_money,
                ]);

                $user->update([
                    'score' => $user->score + $withdrow->deposit_money,
                ]);
                $withdrow->update([
                    'stauts_mony' => 'ملغية',
                    'admin_id' => auth()->user()->id,

                ]);

            }
            Notification::create([
                'user_id' => $withdrow->user_id,
                'admin_id' => auth()->user()->id,
                'type' => 'another',
                "status" => 'ملغية',
                'message' => $request->message,
            ]);
                
            toastr()->success('تمت العمليه بنجاح');
            return back();
            
        } else {
            toastr()->error('انه الغي تفعيله قبل ذالك');
            return back();
        };
     
    }



    //قيد الانتظار

    public function wait($id)
    {

        $withdrow = WithdrawOrDepositMoney::findOrFail($id);
        $user = User::with('scores')->findOrFail($withdrow->user_id);
        if ($withdrow->Notification->status == 'غير جاهزه' ) {
            $withdrow->update([
                'stauts_mony' => 'قيد الانتظار',

            ]);
            Notification::create([
                'user_id' => $withdrow->user_id,
                'admin_id' => auth()->user()->id,
                'type' => 'another',
                "status" => "قيد الانتظار",
                'message' => "تننتظر تحويل الاموال الي اي من الطرفين",
            ]);
         
            toastr()->success('تمت العمليه بنجاح');
        } else {
            toastr()->error('انه تم وضعه في قيد الانتظار قبل ذالك');
        }
        return redirect()->back();
    }
}
