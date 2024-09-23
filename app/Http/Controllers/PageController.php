<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Staff;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // 
    public function user()
    {
        return view("penyewa.welcome");
    }

    public function admin()
    {
        return view("admin.dashboard");
    }

    public function staff()
    {
        // return view("staff.index");
        $staff = Staff::where("id", Auth::user()->id)->get();
        return view("staff.dashboard");
    }
}
