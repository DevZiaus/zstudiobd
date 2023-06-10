<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Roles;

class AdminController extends Controller{
    public function __construct(){

    }

    public function index(){
        $users = User::where('role', '1')->orWhere('role', '2')->get();
        $clients = User::where('role', '3')->get();
        $orders = Orders::get();
        $pendingOrders = Orders::where('status', '1')->get(); 
        return view('backend.dashboard.index', compact(['users', 'clients', 'orders', 'pendingOrders']));
    }
}
