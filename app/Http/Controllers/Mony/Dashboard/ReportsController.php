<?php

namespace App\Http\Controllers\Dashboard;

use auth;
use App\Models\User;
use App\Models\reports;
use App\Models\announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports=  auth()->user();
        $users = DB::table('users')->get()->where('id', '!=',$reports->id);
        // dd($users);
        return view('web.history', compact('users','reports'));
    }

    /**
     * Show the form for creating a new resource.
     */


     public function show_report($id){
        
        $reports= User::with('users','announcements.users')->findOrfail($id);
      
         $x= $this->V_status($id);
       
        
       return view('web.reports.detals_reports', compact('reports' ));
    }

     public function announ($id){
       
       
        $Announcements = announcement::where('days', 0)->paginate(1);

        $Mony = auth()->user()->daily_gain / (announcement::where('days', 0)->count()+1);
        $count= announcement::where('days', 0)->count();
               
              return view('web.annoncereport', compact('Announcements' , 'Mony' ,'count'));
            }
       //web.show_announ

     public function V_status($id)
     {
       
    
      $announ=  auth()->user()->announcements();

        return $announ;
         
         }
         
     

    



    public function create()
    {
        //
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
