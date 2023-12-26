<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Auth2\Login2Request;

use App\Models\Notification;
use App\Models\User;
use App\Models\Score;
use App\Models\WithdrawOrDepositMoney;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
  {
    $this->middleware('permission:المستخدمين', ['only' => ['index', 'search']]);
    $this->middleware('permission:اضافة مستخدم', ['only' => ['store']]);
    $this->middleware('permission:تعديل مستخدم', ['only' => [' update', 'deposit' , 'withdrawal']]);
        $this->middleware('permission:حذف مستخدم', ['only' => ['delete']]);
  }
    public function index()
    {
        $users= User::paginate(8);

        return view('admin.users.index' , compact('users'));
    }

    public function store(Login2Request $request)
    {

            try{

            $id = user::latest()->first()->id;
            $codeRandom =  hexdec(uniqid()) . $id;
            $subCodeRandom = substr($codeRandom, -6);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'code_invention' => $subCodeRandom,
                'phone' => $request->phone,

                'status' => 'مفعل',
                'roles_name' => 'user',
                'score' => 10,
            ]);
            Score::create([
                'score' => 10,
                'user_id' => $user->id,
            ]);
          
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'user_id'=> $user->id,
                'type'=> 'updatUser',
                'message' => $user->name  .   "قام باضافة مستخدم",
                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
            toastr()->success('تم حفظ البيانات بنجاح ');
            return redirect(url('/users'));
       
                }catch(\Exception $e){
            toastr()->error('خطأ ح ');
                    // return redirect()->back()->with(['Messages'=>$e->getMessage()]);
                    echo 'erroe';
                }




    }
//end store owner
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {




           try{
             $user= User::findOrFail($request->id);
            User::findOrFail($request->id)->update([
                'status'=>$request->status,


               ]) ;
          
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'user_id' => $user->id,
                'type' => 'updatUser',
                'message' =>   $user->name . '_'.$request->status . '_' . "قام بتحديث المستخدم",
                'status' => 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
            toastr()->success('تحديث البيانات بنجاح');
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->with(['Messages'=>$e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {

        $user = User::findOrFail($request->id);

       
       
        Notification::create([
            'admin_id' => auth()->guard('admin')->user()->id,
           
            'type' => 'updatUser',
            'message' =>  $user->name .   "قام بحذف المستخدم",
            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);
        User::findOrFail($request->id)->delete();
            
        toastr()->success('تم الحذف البيانات بنجاح ');
        return redirect()->back();

    }

    public function deposit(Request $request){
             $request->validate([
         'score'=>'required',
         'reason'=>'required'
        ]);
        $score =Score::where('id', $request->id_scor)->get();
        $scoreOlde= $score[0]->score;

        $score=Score::findOrFail($request->id_scor);
       $score->update([
            'score' => $request->score + $scoreOlde,
        ]);
        $Notification = Notification::create([
            'admin_id' => auth()->guard('admin')->user()->id,
            'status' => 'جاهزه',
            'type' => 'updatUser',
          'user_id'=> $score->user->id,
          'message' =>   '_'. $request->reason.'_'  ."$request->score  قام بالايداع للمسخدم بقيمة قدرها"
            // 'message' =>  $score->user->name . ' ' . $request->reason . ' '.$request->score 
        ]);
       
        WithdrawOrDepositMoney::create([
            'deposit_money' => $request->score,
            'withdraw_money' => 0,
            'notification_id' => $Notification->id,
            'user_id' => $score->user_id,
            'status'=>1,
        ]);
        $user = User::findOrFail($score->user_id);
        $user->Update(['score'=>$user->$score+$request->score]);
        toastr()->success('تم الايداع  بنجاح ');
        return back();
     }

    public function withdrawal(Request $request)
    {
                 $request->validate([
         'score'=>'required',
         'reason'=>'required'
        ]);
        $score = Score::where('id', $request->id_scor)->get();
        $scoreOlde = $score[0]->score;

        if($scoreOlde > $request->score){
           Score::findOrFail($request->id_scor)->update([
                'score' =>  $scoreOlde - $request->score,
            ]);
            $Notification = Notification::create([
             

                'admin_id' => auth()->guard('admin')->user()->id,
                'user_id' =>$score[0]->user_id,
               'status' => 'جاهزه',
                'type' => 'updatUser',

                
                'message' =>   '_'. $request->reason.'_'  . " $request->score    قام  بسحب قيمة من المستخدم "     ,
            ]);
            WithdrawOrDepositMoney::create([
                'deposit_money' => 0,
                'withdraw_money' => $request->score,
                'notification_id' => $Notification->id,
                'user_id' => $score[0]->user_id,
                'status'=>0,
            ]);
            toastr()->success('تم السحب   بنجاح ');
            return back();

         } else{

            toastr()->error('  المبلغ المراد سحبه غير متوفر' );
            return back();
         }


    }

    public function search(Request $request)
    {
        $search = $request->word;


        $users = User::where('code_invention', 'LIKE', "%{$search}%")->paginate(5);
        return view('admin.users.index', compact('users'));
    }
}
