<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Hospital;
use App\Models\HospitalUser;
use App\Models\Role;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkDependence');
    }

    public function index()
    {
        $users = User::all();

        return view('User.index', compact('users'));
    }


    public function create()
    {
        $hospitals = Hospital::pluck('name', 'id')->all(['name', 'id']);
        $roles     = Role::active()->pluck('name', 'id')->all(['name', 'id']);

        return view('user.create', compact('hospitals', 'roles'));
    }


    public function store(UserRequest $request)
    {
        $request['password'] = bcrypt($request->password);

        //开启事务 防止创建关系创建失败  届时取不出数据

        try {
            DB::transaction(function () use ($request) {

                $hospital_id_and_user_id = []; //用于存入hospital_user表 创建关系

                $role_id_and_user_id = [];

                $user_id = User::create($request->all())->id;

                foreach ($request->hids as $hid) {
                    $hospital_id_and_user_id[] = ['user_id' => $user_id, 'hospital_id' => $hid];
                }
                foreach ($request->roles as $role_id) {
                    $role_id_and_user_id[] = ['user_id' => $user_id, 'role_id' => $role_id];
                }

                HospitalUser::insert($hospital_id_and_user_id);
                DB::table('role_user')->insert($role_id_and_user_id);

            });

            return ['code' => '0', 'msg' => route('user.index'), 'time' => time()];
        } catch (\Exception $exception) {
            app()->make('queryLogger')->info($exception->getMessage());

            return ['code' => '1', 'msg' => '添加失败，请稍后重试', 'time' => time()];
        }


    }

}
