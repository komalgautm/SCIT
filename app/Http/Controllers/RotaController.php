<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rota, App\User, App\RotaShift, App\RotaAssignEmployee,App\LeaveType, App\Staffleaves ; 
use Session, DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class RotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('welcome');
        $leave['sickness'] = Staffleaves::where('is_deleted', 1 )->where('leave_status', 1)->where('leave_type', 2)->where('user_id', 15)->count();
        $leave['lateness'] = Staffleaves::where('is_deleted', 1 )->where('leave_status', 1)->where('leave_type', 3)->where('user_id', 15)->count();
        return view('rotaStaff.StaffDashboard', ['sidebar' => 'dashborad'], $leave);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_month =  Carbon::now()->format('m');
        $current_year = Carbon::now()->format('Y');

        $previous_month_data = Carbon::now()->endOfMonth()->subMonth()->toDateString();
        $priormonth = date ('m', strtotime ( '-1 month' , strtotime ( $previous_month_data )));
        $prioryear = date('Y', strtotime($previous_month_data));

        $rota = Rota::where('deleted_status', 1)->get(); 
        $arr = array();
        $active_publish_rota= 0;
        $active_unpublish_rota= 0;
        $old_publish_rota = 0;
        $old_unpublish_rota = 0;
        $old = array();
        foreach($rota as $rotas){
            $convert_date = strtotime($rotas->created_at);
            $month = date('m',$convert_date);
            $year = date('Y',$convert_date);
            if($current_year == $year){
                if( $current_month == $month){
                    $arr[] = $rotas;
                    if($rotas->status === 1){
                        $active_publish_rota++;
                    } if($rotas->status === 0) {
                        $active_unpublish_rota++;
                    }
                }
            }
            if($prioryear == $year){
                if( $priormonth == $month){
                    $old[] = $rotas;
                    if($rotas->status === 1){
                        $old_publish_rota++;
                    } if($rotas->status === 0) {
                        $old_unpublish_rota++;
                    }
                }
            }
           
        }         
        $data['active_rota'] =  $arr;
        $data['old_rota'] =  $old; 
        $data['sidebar'] = 'rota';
        $data['active_publish_rota_count'] = $active_publish_rota;
        $data['active_unpublish_rota_count'] = $active_unpublish_rota;
        $data['old_publish_rota_count'] = $old_publish_rota;
        $data['old_unpublish_rota_count'] = $old_unpublish_rota;
      
        return view('rotaStaff.rotaView', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rota_name = $request->rota_name;
        // Rota::where('rota_name', $request->)->get();
        $date = $request->start_date;
        $date = strtotime($date);
        $date = strtotime("+".(int)$request->rotaPeriodLength." day", $date);
        $date = date('Y-m-d', $date);
        $rota_data = array(
            'user_id' => 15,
            'rota_name' => $request->rota_name,
            'rota_duration' => $request->rotaPeriodLength,
            'rota_start_date' => $request->start_date,
            'rota_end_date' => $date,
            'rota_view' =>$request->rota_view,
            'status' => 0,
            'deleted_status' => 1,                  //deleted record status 1 for active 0 for deleted
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        );
        $rota = Rota::insert($rota_data);
        $latestRotaId = Rota::latest()->first();
        Session::put('rota_flow_id', $latestRotaId->id);  
        return redirect('/rota-planner')->with('shift_view', $request->rota_view, 'last_rota_id');  
    }

    public function rota_calender_view(){
        $data['user'] = User::where('home_id',1)->get();
        $data['sidebar'] = 'rota';
        $latestUser = Rota::latest()->first();
        $data['rota'] = Rota::where('id', $latestUser->id)->get();
        if(session()->get('shift_view') == 1){
            return view('rotaStaff.rota_table', $data);
        }
        if(session()->get('shift_view') == 2){
            return view('rotaStaff.rota_timeline', $data);
        }
        if(session()->get('shift_view') == 3){
            echo "3";
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
        //
    }
    // public function add_shift_data(Request $request){
    //     $shift_data = array(
    //         'rota_id' => 15,
    //         'user_id' => 15,
    //         'shift_time' => "7",
    //         'shift_start_time' => $request->start_date,
    //         'shift_end_time' => $request->end_date,
    //         'break' => 0,
    //         'description' => 0,
    //         'status' =>1,
    //         'shift_color' => 'black',
    //         'created_at'=>date("Y-m-d H:i:s"),
    //         'updated_at'=>date("Y-m-d H:i:s")
    //     );
    //     $rota_shift = RotaShift::insert($shift_data);
    //     $latestRota = RotaShift::latest()->first();
    //     if($latestRota){
    //         echo $latestRota->id;
    //     } else{
    //         echo "not inserted";
    //     }
    // }

    public function get_all_users(){
        $data = User::where('home_id', 1)->orderBy('id', 'DESC')->get();
        echo json_encode($data);
    }

    public function assign_rota_users(Request $request){
        $rota = Session::get('rota_flow_id');
        if(isset($rota)){
            $get_rota = Session::get('rota_flow_id');
        } else {
            $get_rota =  $request->edit_rota_id;
        }
        
        $shift_data = array(
            'rota_id' =>  $get_rota,
            'user_id' => 15,
            'shift_time' => "7",
            'rota_day_date' => Carbon::parse($request->rota_shift_day_date)->format('Y-m-d'),
            'shift_start_time' => $request->start_date,
            'shift_end_time' => $request->end_date,
            'break' => $request->break_time,
            'description' => $request->shift_notes,
            'status' =>1,
            'shift_color' => 'black',
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        );
        
        $rota_shift = RotaShift::insert($shift_data);
        $latestShiftId = RotaShift::latest()->first();

        for ($i=0; $i < count($request->user_ids); $i++) { 
            $assignedUsersRota = array(
                'rota_id' => $get_rota,
                'user_id' => 15,
                'shift_id' => $latestShiftId->id,
                'emp_id' => $request->user_ids[$i],
                'status' =>1,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            );
            $rota_shift = RotaAssignEmployee::insert($assignedUsersRota);
        }

        $data['rotaShift'] = RotaShift::where('id',$latestShiftId->id)->where('status', 1)->get();

        $list_emp = RotaAssignEmployee::where('rota_id', $get_rota)->where('shift_id', $latestShiftId->id)->where('status', 1)->get();
        $userdata = array();
        
        foreach($list_emp as $emp_ids){
            $userdata[] = User::where('id', $emp_ids->emp_id)->get();
        }
        $data['user_name'] = $userdata;
        echo json_encode($data);
    }
    function update_rota_name(Request $request){
        $data = Rota::where('id', $request->rota_id)
        ->update([
            'rota_name' => $request->rota_name
            ]);
        echo json_encode($data);
    }

    function publish_rota_employee(Request $request){
        $data = Rota::where('id', $request->publish_rota_id)
        ->update([
            'status' => 1
            ]);
        echo json_encode($data);
    }

    function unpublish_rota_employee(Request $request){
        $data = Rota::where('id', $request->unpublish_rota_id)
        ->update([
            'status' => 0
            ]);
        echo json_encode($data);
    }


    function calender_view(){
        //get all data for calender
        $leave = Staffleaves::where('is_deleted', 1 )->get();
        $recordArray = array();
        foreach($leave as $value){
            $leave_name = LeaveType::where('id', $value->leave_type)->pluck('leave_name'); 
            $leave_color = LeaveType::where('id', $value->leave_type)->pluck('color'); 
            $user_name  =  User::where('id', $value->user_id)->pluck('name');
            $arr['title'] =  $user_name;
            $arr['color'] =  $leave_color[0];
            $arr['start'] = $value->start_date;
            $arr['end'] = $value->end_date;
            array_push($recordArray,$arr);
        }
        $data['pending_leave'] = DB::table('staff_leaves')
                            ->join('user', 'staff_leaves.user_id', '=', 'user.id')
                            ->join('leave_type', 'leave_type.id', '=', 'staff_leaves.leave_type')
                            ->select('leave_type.leave_name','leave_type.color','leave_type.id as leavetype_id','user.name','user.id as user_id','staff_leaves.start_date', 'staff_leaves.end_date','staff_leaves.id as staffleave_id', 'staff_leaves.days', 'staff_leaves.notes')
                            ->where('staff_leaves.is_deleted', 1 )
                            ->where('staff_leaves.leave_status', 0)
                            ->get();
        $data['calander']=json_encode($recordArray);
        return view('rotaStaff.calender', ['sidebar' => 'calender'], $data);
    }

    function annual_leave_view($id){
        $data['leave'] = $id;
        $data['sidebar'] = '';
        $data['leavetype'] = LeaveType::where('status', 1)->get();
        $data['users'] = User::where('home_id', 1)->get();
       
        return view('rotaStaff.add_leave', $data);
    }

    function get_all_users_search(Request $request){
        $data = User::where('home_id', 1)->Where('name', 'like', '%' . $request->search_data . '%')->get();
        echo json_encode($data);
    }


    function delete_rota_employee(Request $request){
        $data = Rota::where('id', $request->id)
        ->update([
            'deleted_status' => 0
            ]);
        echo json_encode($data);
    }


    function edit_rota($id){
        $rota = Rota::where('id', $id)->get();
        $data['sidebar'] = 'rota';
        $latestUser = Rota::latest()->first();
        foreach($rota as $rota_data){
           $view = $rota_data->rota_view;
        }
        $data['pass_rota_id'] = $id; 
        $data['rota'] = Rota::where('id', $id)->get();
        if($view == 1){
            return view('rotaStaff.rota_table', $data);
        }
        if($view == 2){
            return view('rotaStaff.rota_timeline', $data);
        }
        if($view == 3){
            echo "3";
        }
    }

    function publish_unpublish_rota(Request $request){

      
        if($request->rota_status == 1)
        {
            $data = Rota::where('id', $request->rota_id)
            ->update([
                'status' => 0
                ]);
            echo "unpublished";
        }   
        if($request->rota_status == 0 ){
            $data = Rota::where('id', $request->rota_id)
            ->update([
                'status' => 1
                ]);
                echo "published";
        }
    }

    function add_leave(Request $request){
        if($request->ongoingLeave == "on"){
            $ongoingLeave = 1;
        }else {
            $ongoingLeave = 0;
        }

        if(!isset($request->start_date)){
            $date = $request->late_date;
        } else {
            $date = $request->start_date;
        }
        // $data = $request->validate([
        //     'type' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'base_capacity' => 'required',
        //     'max_occupancy' => 'required',
        // ]);
        if(empty($request->late_time)){
            $late_time = null;
        }else{
            $late_time = $request->late_time;
        }
        if(empty($request->missed_days)){
            $missed_working_days = null;
        }else{
            $missed_working_days = $request->missed_days;
        }

        
        $add_leave = array(
            'user_id' => (int)$request->employee_list,
            'leave_type' => (int)$request->leave_type,
            'ongoing_absence' => $ongoingLeave,
            'start_date' => $date,
            'start_date_full_half' => (int)$request->start_date_full_half,
            'end_date' => $request->end_date,
            'end_date_full_half' => (int)$request->end_date_full_half,
            'late_by' => $late_time,
            'notes' => $request->notes,
            'days' => $missed_working_days,
            'leave_status' => 0,
            'is_deleted' => 1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")  
        );
        $data = Staffleaves::insert($add_leave);
        return redirect('/pending-request');
       
    }

    function leave_pending(){
        $data['last_leave'] = Staffleaves::latest()->first();
        $last_leave = Staffleaves::latest()->first();
        $user = User::where('id', $last_leave->user_id)->get();
        foreach($user as $user_data){
            $user_name = $user_data->name;
        }
        $data['username'] = $user_name;
        $data['sidebar'] = 'action';
        return view('rotaStaff.leave_pending', $data);
    }

    function date_validation_for_user(Request $request){
        $request->start_date_input;
        $staff_leaves = Staffleaves::where('is_deleted', 1)->where('user_id', $request->start_id)->get();
        $arr = array();
        foreach($staff_leaves as $staff_leave ){
            $period = \Carbon\CarbonPeriod::create($staff_leave->start_date, $staff_leave->end_date);
            foreach ($period as $date) {
                // echo $date->format('Y-m-d');
                if($request->start_date_input == $date->format('Y-m-d')){
                    $arr[] =  \Carbon\Carbon::parse($staff_leave->start_date)->format('D, jS M');
                    $arr[] =  \Carbon\Carbon::parse($staff_leave->end_date)->format('D, jS M');
                }
            }
            $dates = $period->toArray(); 
        }
        echo json_encode($arr);
    }

    // function get_all_leave(){
    //     $data['leaves'] = Staffleaves::where('user_id', 15)->get();
    //     echo json_encode($data);   
    // }

    function employee_view(){
        $data['sidebar'] = 'employee';
        $data['user'] = User::where('home_id', 1)->get();
        return view('rotaStaff.employee', $data);
    }

    function get_rota_employee(Request $request){
        // $data['rota'] = DB::table('rota')
        //     ->join('rota_assign_employees', 'rota_assign_employees.rota_id', '=', 'rota.id')
        //     ->join('user', 'user.id', '=', 'rota_assign_employees.emp_id')
        //     ->join('rota_shift', 'rota_shift.id', '=', 'rota.id')
        //     ->select('user.id as user_id','user.name','rota_shift.id as rota_shift_id','rota_shift.break','rota_shift.shift_start_time','rota_shift.shift_end_time')
        //     ->where('rota_shift.status', 1 )
        //     ->where('rota_assign_employees.status', 1)
        //     ->get();

          $data['rota'] = DB::table('rota_assign_employees')
            ->join('user', 'user.id', '=', 'rota_assign_employees.emp_id')
            ->join('rota_shift','rota_shift.rota_id','=', 'rota_assign_employees.rota_id')
            ->select('rota_assign_employees.id as rota_assign_id','user.id as users_id','user.name','rota_shift.break','rota_shift.shift_start_time','rota_shift.shift_end_time')
            ->where('rota_assign_employees.rota_id', $request->id)
            ->get();

        echo json_encode($data); 
    }

    function get_all_shift(Request $request){
        
    }
}
