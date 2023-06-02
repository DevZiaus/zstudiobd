<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller{
    public function index(){
       if(Auth::id()) {
        $userRole = Auth::user()->role;
        if($userRole == '1') {
            return view('backend.dashboard.index');
        }else if($userRole == '2') {
            return view('backend.dashboard.index');
        }else if($userRole == '3') {
            return view('dashboard');
        }else {
            return redirect()->back();
        }
       }
    } 
}
