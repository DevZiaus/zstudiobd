<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use Carbon\Carbon;
use Session;

class UserRoleController extends Controller{
    public function __construct() {

    }

    public function index(){
        $allRoles=Roles::get();
        //dd($allRoles);
        return view('backend.userRoles.all', compact('allRoles'));
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
