<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Illness;
use App\Models\Patient;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
{
    //需要回访
    const TIME_TO_TRACK = '1';

    const NEED_TRACK = '2';


    public function __construct()
    {
    }

    public function index(Request $request)
    {

        $patients = new Patient;

        //根据日期筛选
        if ($request->has('created_at')) {
            $patients = $patients->whereDate('created_at', date('Y-m-d', strtotime($request->created_at)));
        }

        //到期回访
        if ($request->has('status')) {
            switch ($request->status) {
                case self::TIME_TO_TRACK:
                    $patients = $patients->whereHas('tracks', function ($query) {
                        $query->whereDate('next', Carbon::now()->format('Y-m-d'));
                    });

                    break;

                case self::NEED_TRACK:

                    break;
            }
        }


        $patients = $patients->with([
            'user',
            'illness',
            'tracks' => function ($query) {
                $query->orderBy('next', 'desc');
            }
        ])->paginate(20);


        return view('patient.index', compact('patients'));
    }


    public function create()
    {
        $illnesses = Illness::where('hospital_id', session('hospital.id'))->active()->get();

        $medical_num = Carbon::now()->format('YmdHisu') . Auth::id();

        return view('patient.create', compact('illnesses', 'medical_num'));
    }


    public function store(PatientRequest $request)
    {
        $request['hospital_id'] = session('hospital.id');
        $request['user_id']     = Auth::id();
        if (Patient::create($request->all())) {
            return code('0', route('patients.index'));
        }

        return code('1', '添加失败，请稍后重试');
    }


}
