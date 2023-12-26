<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Notification;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:الباقات الأتوماتيك');
       
        //  $this->middleware('permission:الإعلانات');
        //  $this->middleware('permission:المستخدمين');
        // $this->middleware('permission:الاعدادات');
       
        // $this->middleware('permission:ضريبة التحويل');
        // $this->middleware('permission:الموظفين');
        $this->middleware('permission:الصلاحيات', ['only' => ['index', 'create', 'store','show', 'edit','update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
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
            'name' => 'required|unique:roles,name',
            'permissions.*' => 'required',
        ]);
        // dd($request->permissions);
        $permissions = Permission::pluck('id', 'id')->all();
        // dd($permissions, intval());
       
        // 
      

        if ($request->permissions) {
            $role = Role::create(['name' => $request->input('name')]);
       foreach($request->permissions as $value)
        DB::table('role_has_permissions')->insert([
                'role_id'=> $role->id ,
                'permission_id'=> intval($value),
        ]);
        // ->syncPermissions();}
        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
        Notification::create([


            'admin_id' => auth()->guard('admin')->user()->id,
            'message' =>  "قام باضافة صلاحية",
            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);
            
        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');}
            else{
                 toastr()->success('  يجب ادخال الصلاحيات');
              return back()  ;
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
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
            
         

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
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
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $val=[];
       foreach ($request->input('permission') as $value)
            $val[] = (int)$value;
    $role->syncPermissions($val);
       Notification::create([

            'admin_id' => auth()->guard('admin')->user()->id,
            'message' =>   "قام بتحديث  صلاحية",
            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Notification::create([
            'admin_id' => auth()->guard('admin')->user()->id,
            'message' =>  "قام بحذف صلاحية",
            'status' => 'جاهزه',
            'created_at' => date('d-m-Y'),
        ]);
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
