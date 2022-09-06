<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //dashboard user
    public function index()
    {
        $header = "Home";
        return view('user.Dashboard', compact('header'));
    }
}
