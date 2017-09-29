<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Illness;
use App\Models\Ways;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AppointmentsController extends Controller
{


    public function __construct()
    {
        $this->middleware('checkDependence');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $appointments = Cache::remember('appointments', '1000', function(){
            $appointments = new Appointment;

            return  $appointments->with('tracks')->get();

        });


        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors   = Doctor::all();
        $illnesses = Illness::all();
        $ways      = Ways::all();

        return view('appointment.create', compact('doctors', 'illnesses', 'ways'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointRequest $request)
    {

        $app_num = Carbon::now()->format('YmdHisu');

        $request['hospital_id'] = session('hospital.id');
        $request['user_id']     = Auth::id();
        $request['app_num']     = $app_num;
        $request['book_date']   = Carbon::parse($request->book_date)->format('Y-m-d H:i:s');

        if (Appointment::create($request->all())) {
            return code('0', route('appointments.index'));
        }

        return code('1', '添加失败，请稍后重试');
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
}
