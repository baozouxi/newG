<?php

namespace App\Http\Controllers;

use App\Http\Traits\Statistics;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientReportController extends Controller
{
    use Statistics;

    public function __invoke(Request $request)
    {

        $patients = new Patient();

        $months = $patients->getMonths();

        $month = Carbon::now()->format('m');

        //两个标志位 用来判断页面是否传参过来  方便在页面做判断
        $sent_month = false;
        $sent_doctor_id = false;

        if ($request->has('month') && ($request->input('month') != 0)) {
            $sent_month = $request->input('month');
            $month = Carbon::createFromFormat('Y-m', $request->input('month'))->format('m');
        }

        $patients = $patients->whereMonth('created_at', $month);

        if ($request->has('doctor_id') && ($request->input('doctor_id') != 0)) {
            $patients = $patients->where('doctor_id', $request->input('doctor_id'));
            $sent_doctor_id = $request->input('doctor_id');
        }

        $patients = $patients->get();

        $total = new \stdClass();
        $total->count         = $patients->count();
        $total->book_count    = $patients->where('book_id', '!=', '0')->count();
        $total->un_book_count = $patients->where('book_id', '0')->count();

        $patients = $patients->groupBy($this->statis('day'));


        $doctors = Doctor::all();


        return view('patient.report.index', compact('patients', 'total', 'sent_month', 'sent_doctor_id', 'months', 'doctors'));
    }

}
