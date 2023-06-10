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
      $allClients=User::where('role', '3')->orderBY('id', 'DESC')->get();
        return view('backend.clients.all', compact('allClients'));
      }

      public function view($id){
        $client=User::where('id',$id)->firstOrFail();
        return view('backend.clients.view', compact('client'));
      }

      public function makeAdmin(Request $request){
        $id=$request['id'];
        
        // dd($request);
        $update=User::where('id',$id)->update([
          'role'=>'2',
        ]);
  
        if($update){
          Session::flash('success','Successfully Updated.');
          return redirect('/admin/users');
        }else{
          Session::flash('error','Can not Update');
          return redirect()->back();
        }
      }
  
      public function add(){
  
      }
  
      public function edit(){
  
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
