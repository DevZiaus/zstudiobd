<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
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

      public function view($id){
        $user=User::where('id',$id)->firstOrFail();
        return view('backend.users.view', compact('user'));
      }
  
      public function edit($id){
        $user=User::where('id',$id)->firstOrFail();
        $allRole=Roles::where('role_status',1)->orderBy('role_id','ASC')->get();
        return view('backend.users.edit', compact(['user', 'allRole']));
      }
  
      public function insert(){
  
      }
  
      public function update(Request $request){
        $id=$request['id'];
        
        // dd($request);
        $update=User::where('id',$id)->update([
          'name'=>$request['name'],
          'phone'=>$request['phone'],
          'username'=>$request['username'],
          'role'=>$request['role'],
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
  
        if($update){
          Session::flash('success','Successfully Updated.');
          return redirect('/admin/users/view/'.$id);
        }else{
          Session::flash('error','Can not Update');
          return redirect()->back();
        }
      }
  
      public function softdelete(){
  
      }
  
      public function restore(){
  
      }
  
      public function delete(){
  
      }
}
