<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Score;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Admin::orderBy('id', 'DESC')->paginate(5);

        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

       
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles_name' => 'required'
        ]);

       

        try {
            //  $input = $request->all();
            //  dd($input);
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
              
                'phone' => $request->phone,
               
                'status' => $request->status,
                'roles_name' => $request->roles_name
            ]);

            $admin->assignRole($request->input('roles_name'));

          
            Notification::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'message' =>  $admin->name
                . "قام باضافة مالك",
                'status'=> 'جاهزه',
                'created_at' => date('d-m-Y'),
            ]);
              toastr()->success('تم حفظ بنجاح ');
         return redirect()->route('userspromission.index');
              
        } catch (\Exception $e) {

            toastr()->error('خطأ ح ');
            return redirect()->back()->with(['Messages' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Admin::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles_name' => 'required',
            'created_at' => date('d-m-Y'),
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {

            $input = Arr::except($input, array('confirm-password'));
            $input['password'] = Hash::make($input['password']);
        } else {

            $input = Arr::except($input, array('confirm-password'));
            $input = Arr::except($input, array('password'));
        }

        $user = Admin::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles_name'));


          $nameDel= Admin::select('name')->where('id', $id)->get();
         
        Notification::create([
          
         
            'admin_id' => auth()->guard('admin')->user()->id,
            'message' =>   $nameDel[0]->name .  "قام بتحديث المالك ",
            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);

        return redirect()->route('userspromission.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
       $admin=  Admin::find($request->user_id);
      
        Notification::create([
             'admin_id' => auth()->guard('admin')->user()->id,
            'message' =>  $admin->name .   "قام بحذف المالك ",
            'status' => 'جاهزه',
            'created_at'=>date('d-m-Y'),
        ]);
        Admin::find($request->user_id)->delete();
       
        return redirect()->route('userspromission.index')
            ->with('success', 'User deleted successfully');
    }
}
