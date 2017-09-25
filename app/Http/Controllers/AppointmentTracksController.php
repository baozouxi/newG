<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentTrack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentTracksController extends Controller
{

    public function index()
    {
        $tracks = AppointmentTrack::with('appointment')->get();

        return view('appointment.track.index', compact('tracks'));
    }

    public function create(Request $request)
    {
        $appointment = Appointment::findOrFail($request->input('appointment_id'));


        return view('appointment.track.create', compact('appointment', 'tracks'));
    }

    public function withInfo(Appointment $appointment)
    {
        $tracks = AppointmentTrack::all();
        return view('appointment.track.withAppointmentInfo', compact('appointment', 'tracks'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'next'           => 'required|date_format:Y-m-d H:i|after_or_equal:today',
            'appointment_id' => 'required|integer|min:1|exists:appointments,id',
            'content'        => 'required|string|min:6',
        ], [
            'next.required'       => '请输入下次回访日期',
            'next.after_or_equal' => '回访日期只能在今天之后',
            'content.required'    => '请输入备注',
            'content.min'         => '备注最少6个字符'
        ]);

        $request['user_id']     = Auth::id();
        $request['hospital_id'] = session('hospital.id');
        $request['next']        = Carbon::parse($request->input('next'))->format('Y-m-d H:i:s');


        if (AppointmentTrack::create($request->all())) {
            return code('0', route('appTracksWithInfo', ['$appointment' => $request->appointment_id]));
        }

        return code('1', '添加失败，请稍后重试');
    }


}
