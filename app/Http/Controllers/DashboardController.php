<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Department;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['home']]);
    }

    public function home()
    {
        $staffs = DB::table('staff')
        ->select(DB::raw('name,email,phone_number,level,id'))
        ->orderBy('name', 'asc')
        ->get();
    if(count($staffs) > 0 ){
    return view('/welcome')->with('staffs',$staffs);
    }else{
        return view('/welcome');
    }

}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $staffs = DB::table('staff')
        ->select(DB::raw('name,email,phone_number,level,id'))
        ->orderBy('name', 'asc')
        ->get();
    if(count($staffs) > 0 ){
    return view('dashboard')->with('staffs',$staffs);
    }else{
        return view('dashboard');
    }

}
        

    public function staff()
    {
        return view('staff');
    }

    public function department()
    {
        return view('department');
    }

    public function department_list()
    {
        $department_list = DB::table('departments')
        ->select(DB::raw('distinct department'))
        ->groupBy('department')
        ->orderBy('department', 'asc')
        ->get();
        return view('department_list') -> with('department_list',$department_list);
    }

    public function view($id)
    {
        $id = $id;
        $staff = DB::table('staff')->select('name')
        ->where('id', $id)-> first();
        //$department = DB::table('departments')->select('department') -> get();
        $departments = new Department;
        $department = $departments :: all();
        $role = array('name' => $staff -> name, $department);
        if(count($staff) == 1 ) {
        return view('staff_role',compact('staff','department','id'));
        }else{

            return redirect()->action('DashboardController@index');
        }
        
    }

    public function detail($id)
    {
        $id = $id;
        $staff_role = DB::table('staff_roles')
                ->select('staff_id','staff_name','staff_department','staff_role','id')
        ->where('staff_id', $id)-> get();
        if(($staff_role) ) {
        return view('detail')->with('staff_role',$staff_role);
        }else{

            return redirect()->action('DashboardController@index');
        }
        
    }

    public function role($id)
    {
        $department = $id;
        $staff_role = DB::table('staff_roles')
                        ->select(DB::raw('count(staff_department) AS total,staff_id, staff_role'))
                        ->where('staff_department',$department)
                        ->groupBy('staff_department','staff_id')
                        ->orderBy('staff_department', 'asc')
                        ->get();
        if(($staff_role) ) {
        return view('role')->with('staff_role',$staff_role);
        }else{

            return redirect()->action('DashboardController@index');
        }
        
    }

    public function staff_role()
    {
        return view('staff_role');
    }

   
}
