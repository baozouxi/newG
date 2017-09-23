<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientTrackRequest;
use App\Models\Patient;
use App\Models\PatientTrack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientTracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tracks = PatientTrack::with(['user', 'patient']);


        if ($request->has('created_at')) {
            $create_at = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('created_at'))->format('Y-m-d');
            $tracks    = $tracks->whereDate('created_at', $create_at);
        }

        $tracks = $tracks->get();


        return view('patient.track.index', compact('tracks'));
    }

    public function withPatientInfo(Patient $patient)
    {
        $tracks = PatientTrack::where('patient_id', $patient->id)->with('user')->get();

        return view('patient.track.withPatientInfo', compact('patient', 'tracks'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patient = Patient::findOrFail($request->input('patient'));

        return view('patient.track.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PatientTrackRequest $request)
    {
        $request['next']        = Carbon::createFromFormat('Y-m-d H:i', $request->next)->toDateTimeString();
        $request['hospital_id'] = session('hospital.id');
        $request['user_id']     = Auth::id();
        if (PatientTrack::create($request->all())) {
            return code('0', route('patients.index'));
        }

        return code('1', '创建失败,请稍后重试');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(PatientTrack $patientTrack)
    {
        $patient = $patientTrack->patient;

        return view('patient-tracks.show', compact('patient', 'patientTrack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientTrack $patientTrack)
    {

        $patient = $patientTrack->patient;

        return view('patient.track.edit', compact('patient', 'patientTrack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PatientTrackRequest $request, PatientTrack $patientTrack)
    {
        $patientTrack->next    = Carbon::createFromFormat('Y-m-d H:i', $request->input('next'))->format('Y-m-d H:i:s');
        $patientTrack->content = $request->input('content');
        if ($patientTrack->save()) {
            return code('0', route('trackWithPatientInfo', ['patient' => $patientTrack->patient->id]));
        }

        return code('1', '修改失败，请稍后重试');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
