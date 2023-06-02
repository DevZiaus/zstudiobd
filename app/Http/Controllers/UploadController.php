<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Orders;
use Carbon\Carbon;
use Session;

class UploadController extends Controller
{
    public function index(){
      return view('frontend.upload');
    }

    
    public function insert(Request $request){
      // $this->validate($request,[
      //   'name'=>'required|string|max:255',
      //   'email'=>'required|string|max:255|unique:users',
      //   'password'=>'required|string|min:8|max:255|confirmed',
      //   'role'=>'required',
      // ],[
      //   'name.required'=>'Please enter name.',
      //   'email.required'=>'Please enter email address.',
      //   'password.required'=>'Please enter password.',
      //   'role.required'=>'Please select user role.',
      // ]);
      $insert=Orders::insertGetId([
        'link'=>htmlentities($request['link']),
        'user'=>auth()->id(),
        // 'file'=>$request['file'],
        // 'password'=>Hash::make($request['password']),
        // 'role'=>$request['role'],
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      // if($request->hasFile('pic')){
      //   $image=$request->file('pic');
      //   $imageName=$insert.'_'.time().'_'.rand(100000,10000000).'.'.$image->getClientOriginalExtension();
      //   Image::make($image)->resize(250,250)->save('uploads/users/'.$imageName);

      //   User::where('id',$insert)->update([
      //     'photo'=>$imageName,
      //     'updated_at'=>Carbon::now()->toDateTimeString(),
      //   ]);
      // }

      if($insert){
        Session::flash('success','Successfully complete user registration.');
        return redirect('/orders/all');
      }else{
        Session::flash('error','User registration failed.');
        return redirect('/upload');
      }
    }

    public function viewAllOrders(){
      $allOrders=Orders::orderBY('id', 'DESC')->where('user', auth()->id())->get();
      return view('frontend.clientOrder', compact('allOrders'));
    }

    public function view($id){
      $order=Orders::where('user',Auth::user()->id)->where('id',$id)->firstOrFail();
      return view('frontend.clientSingleOrder',compact('order'));
    }

    public function softdelet(Request $request){
      
      
    }
}
