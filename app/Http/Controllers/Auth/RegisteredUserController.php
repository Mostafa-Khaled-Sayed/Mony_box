<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Score;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Events\MyEvent;
use App\Models\Notification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', 'min:8',],
            'code_invention' => ['required', 'exists:users,code_invention'],
            'phone'=>['required' ,  'numeric']
        ]);

        $userID = User::where('code_invention', $request->code_invention)->first()->id;

        try {

            $id = user::latest()->first()->id;
            $codeRandom =  hexdec(uniqid()) . $id;
            $subCodeRandom = substr($codeRandom, -6);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone'=>$request->phone,
                'password' => Hash::make($request->password),
                'code_invention' =>  $subCodeRandom,
                'user_id' => $userID,
                "score"=>10,
            ]);
            Score::create([
                'score' => 10,
                'user_id' => $user->id,
            ]);

            Auth::login($user);

            event(new Registered($user));
             $data=[
                'name' => $user->name,
                'email'=>$user->email,
                'code_invention'=>$user->code_invention,
                'created_at' =>  date('Y-m-d H:i:s a') ,
             ];

            event(new MyEvent($data));
            Notification::create(['user_id' => $user->id, 'type'=> "register"]);
            return redirect(RouteServiceProvider::HOME);


        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
