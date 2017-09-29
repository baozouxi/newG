<?php

namespace App\Http\Controllers;

use App\Http\CommonRuleInterface;
use App\Http\Traits\Statistics;
use App\Models\Appointment;
use App\Models\Hospital;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentReportsController extends Controller
{
    use Statistics;

    public function __invoke(Request $request)
    {
        $appointments = new Appointment;
        $months       = $appointments->getMonths();

        $sent_month   = false;
        $sent_user_id = false;

        //总计
        $total            = new \stdClass();
        $total->count     = $appointments->count();
        $total->hospitald = $appointments->where('status', CommonRuleInterface::HOSPITALD)->count();

        if ($request->has('month')) {
            $sent_month = $request->input('month');
            $appointments = $appointments->whereMonth('created_at', Carbon::parse($request->month)->format('m'));
        }

        if ($request->has('user_id')) {
            $sent_user_id = $request->input('user_id');
            $appointments = $appointments->where('user_id',(int)$request->input('user_id'));
        }

        $appointments = $appointments->get();
        $appointments = $appointments->groupBy($this->statis('day'));


        $users = Hospital::find(session('hospital.id'))->users;


        return view('appointment.report.index',
            compact('months', 'appointments', 'total', 'sent_month', 'sent_user_id', 'users'));
    }


}
