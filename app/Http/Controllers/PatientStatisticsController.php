<?php

namespace App\Http\Controllers;

use App\Http\Traits\Statistics;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatientStatisticsController extends Controller
{
    use Statistics;

    public function __invoke(Request $request)
    {
        $patients   = new Patient;
        $months     = $patients->getMonths();
        $patients   = $patients->orderBy('created_at', 'desc');

        $sent_month = false;

        if ($request->has('month')) {
            $month      = Carbon::parse($request->month)->format('m');
            $patients   = $patients->whereMonth('created_at', $month);
            $sent_month = $request->input('month');
        }

        $patients = $patients->get();

        $view = 'patient.statistics.index'; //根据情况分配模版

        $total = $patients->count();

        $field = 'user_id';

        if ($request->has('field')) {
            $field = $request->input('field');
            $view  = 'patient.statistics.table';
        }

        $patients = $patients->groupBy($this->statis($field));

        $patients = $patients->sortBy(function ($item, $key) {
            return $key;
        });


        return view($view, compact('patients', 'total', 'sent_month', 'months'));
    }
}
