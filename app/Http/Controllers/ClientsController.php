<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Session;


class ClientsController extends Controller{
    public function __construct() {

    }

    public function index(){
      $allclients=User::where('role', '3')->orderBY('id', 'DESC')->get();
        return view('backend.clients.all', compact('allclients'));
      }
  
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
