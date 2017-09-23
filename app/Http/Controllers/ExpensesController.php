<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expenses = new Expense();

        if ($request->has('created_at')) {
            $expenses = $expenses->whereDate('created_at', $request->input('created_at'));
        }

        $expenses = $expenses->get();

        return view('expense.index', compact('expenses'));
    }

    public function withPatientInfo(Patient $patient)
    {
        $expenses = $patient->expenses;

        return view('expense.withPatientInfo', compact('patient', 'expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patient = Patient::findOrFail($request->input('patient'));

        return view('expense.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        $request['user_id']     = Auth::id();
        $request['hospital_id'] = session('hospital.id');
        if (Expense::create($request->all())) {
            return code('0', route('expenseWithPatientInfo', ['patient' => $request->patient_id]));
        }

        return code('1', '添加失败，请稍后重试');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $patient = $expense->patient;

        return view('expense.edit', compact('patient', 'expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $this->validate($request, [
            'doctor_id'      => 'required|min:1|integer',
            'dose'           => 'required|min:0|integer',
            'check_price'    => 'required|min:0|integer',
            'drug_price'     => 'required|min:0|integer',
            'cure_price'     => 'required|min:0|integer',
            'hospital_price' => 'required|min:0|integer',
            'content'        => 'required|string|min:4'
        ], [
            'doctor.required'         => '请选择医生',
            'dose.required'           => '请输入药量',
            'check_price.required'    => '请输入检查费用',
            'drug_price.required'     => '请输入药品费用',
            'cure_price.required'     => '请输入治疗费用',
            'hospital_price.required' => '请输入住院费用',
            'dose.integer'            => '请输入数字',
            'doctor_id.integer'       => '请输入数字',
            'check_price.integer'     => '请输入数字',
            'drug_price.integer'      => '请输入数字',
            'cure_price.integer'      => '请输入数字',
            'hospital_price.integer'  => '请输入数字',
            'content.required'        => '请输入备注',
            'content.min'             => '备注最少4个字符'
        ]);

        $expense->doctor_id      = $request->input('doctor_id');
        $expense->dose           = $request->input('dose');
        $expense->check_price    = $request->input('check_price');
        $expense->drug_price     = $request->input('drug_price');
        $expense->cure_price     = $request->input('cure_price');
        $expense->hospital_price = $request->input('hospital_price');
        $expense->content        = $request->input('content');

        if ($expense->save()) {
            return code('0', route('expenseWithPatientInfo', ['patient' => $expense->patient->id]));
        }

        return code('1', '更新失败，请稍后再试');
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
