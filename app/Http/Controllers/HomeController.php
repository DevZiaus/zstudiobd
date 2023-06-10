<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

class HomeController extends Controller{
    public function index(){
       if(Auth::id()){
        return redirect('/home');
       }else{
        return view('auth.login');
       }
    }
}
