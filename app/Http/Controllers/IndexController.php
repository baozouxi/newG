<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke(Request $request)
    {
        $user      = $request->user();
        $hospital  = $user->hospitals()->first();
        $hospitals = $user->hospitals()->get();
        $request->session()->put('hospital', ['name' => $hospital->name, 'id' => $hospital->id]);

        return view('index', compact('hospitals'));
    }
}
