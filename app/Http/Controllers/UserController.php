<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Session;


class UserController extends Controller{
    public function __construct() {

    }

    public function index(){
        $allUser=User::orderBY('id', 'DESC')->where('role', '1')->orWhere('role', '2')->get();
        return view('backend.users.all', compact('allUser'));
      }

      // public function viewClients(){
      //   return view('backend.clients.all');
      // }
  
      public function add(){
  
      }
  
      public function edit(){
  
      }
  
      public function view(){
  
      }
  
      public function insert(){
  
      }
  
      public function update(){
  
      }
  
      public function softdelete(){
  
      }
  
      public function restore(){
  
      }
  
      public function delete(){
  
      }
}
