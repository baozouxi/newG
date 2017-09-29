<?php

namespace App\Http\Middleware;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Illness;
use App\Models\Role;
use App\Models\Ways;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDependence
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $error = '';


        if (Hospital::count() < 1) {
            $error = '医院不存在，请至少添加一项医院并启用它';
        }

        if (Role::active()->count() < 1) {
            $error = '用户组不存在，请至少添加一项用户组并启用它';
        }

        if (Doctor::count() < 1) {
            $error = '医生不存在，请至少添加一项医生冰启用它';
        }

        if (Illness::count() < 1) {
            $error = '病种不存在，请至少添加一项并且启用它';
        }

        if (Ways::count() < 1) {
            $error = '预约途径不存在，请至少添加一项并且启用它';
        }


        if ($error) {
            return redirect(route('error', compact('error')));
        }

        return $next($request);
    }
}
