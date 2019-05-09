<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Department;
use App\StaffRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CreateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function staff(Request $request)
    {
        $this -> validate($request,[
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:staff'],
            'phone_number' => 'required',
            'level' => 'required',
        ]);

        $staff = new Staff;
        $staff -> name = $request -> name;
        $staff -> email = $request -> email;
        $staff -> phone_number = $request -> phone_number;
        $staff -> level = $request -> level;
       
        $createstaff =  $staff -> save();
        if($createstaff){
            $staff_name = $request -> name;
            $staff_success =  $staff_name . "  A Staff Successfully  created";
            return redirect('dashboard')->with('staff_success', $staff_success);
              //return view('dashboard')->with('staff_success', $staff_success);
        }
    }

    public function department(Request $request)
    {
        $this -> validate($request,[
            'department' => ['required', 'string', 'max:191', 'unique:departments'],
        ]);

        $department = new Department;
        $department -> department = $request -> department;

        $create =  $department -> save();
        if($create){
            $department = $request -> department;
            $department_success =  $department . "  Department Successfully  created";
            return redirect('dashboard')->with('department_success', $department_success);
               //return view('/dashboard')->with('department_success', $department_success);
        }
    }

    public function staff_role(Request $request)
    {
        $this -> validate($request,[
            'staff_id' => ['required', 'string', 'max:191'],
            'staff_department' => ['required', 'string', 'max:191'],
            'staff_role' => ['required', 'string', 'max:191'],
            'staff_name' => ['required', 'string', 'max:191'],
        ]);

        $staffrole = new StaffRole;
        $staffrole -> staff_id = $request -> staff_id;
        $staffrole -> staff_name = $request -> staff_name;
        $staffrole -> staff_department = $request -> staff_department;
        $staffrole -> staff_role = $request -> staff_role;

        $create =  $staffrole -> save();
        if($create){
            $staff_name = $request -> staff_name;
            $staffrole_success =  $staff_name . "  Roles was succesfully Added";
            return redirect('dashboard')->with('staffrole_success', $staffrole_success);
               //return view('/dashboard')->with('department_success', $department_success);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete =   DB::table('staff_roles')->where('id', $id)->delete();
      if($delete){
        return redirect()->action('DashboardController@index'); 
      }
    }
}
