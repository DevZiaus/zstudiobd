<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Roles;


class DashboardController extends Controller{
    public function index(){
        $users = User::where('role', '1')->orWhere('role', '2')->get();
        $clients = User::where('role', '3')->get();
        $orders = Orders::get();
        $pendingOrders = Orders::where('status', '1')->get(); 
       if(Auth::id()) {
        $userRole = Auth::user()->role;
        if($userRole == '1') {
            return view('backend.dashboard.index', compact(['users', 'clients', 'orders', 'pendingOrders']));
        }else if($userRole == '2') {
            return view('backend.dashboard.index', compact(['users', 'clients', 'orders', 'pendingOrders']));
        }else if($userRole == '3') {
            return view('dashboard');
        }else {
            return redirect()->back();
        }
       }
    } 
}
