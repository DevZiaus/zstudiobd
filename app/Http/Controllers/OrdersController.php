<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Carbon\Carbon;
use Session;

class OrdersController extends Controller{
    public function __construct() {

    }

    public function index(){
      $allOrders = Orders::with(['uploader', 'mediaInfo', 'osInfo', 'psInfo'])
        ->orderBy('id', 'DESC')
        ->get();

      return view('backend.orders.all', compact('allOrders'));
    }


  
      public function add(){
  
      }
  
      public function edit(){
  
      }
  
      public function view($id){
        $order=Orders::where('id',$id)->firstOrFail();
        return view('backend.orders.view',compact('order'));
      }

      public function setps(Request $request){
        $id=$request['id'];
        $order=Orders::where('id',$id)->firstOrFail();
        $ps_status=$order->ps_status;
        
        // dd($request);
        $update=Orders::where('id',$id)->update([
          'ps_status'=> $ps_status = '1' ? '2' : '1',
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
  
        if($update){
          Session::flash('success','Successfully Updated.');
          return redirect()->back();
        }else{
          Session::flash('error','Can not Update');
          return redirect()->back();
        }
      }

      public function setos(Request $request){
        $id=$request['id'];
        $order=Orders::where('id',$id)->firstOrFail();
        $status=$order->status;
        
        // dd($request);
        $update=Orders::where('id',$id)->update([
          'status'=> $status = '2' ? '1' : '2',
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
  
        if($update){
          Session::flash('success','Successfully Updated.');
          return redirect()->back();
        }else{
          Session::flash('error','Can not Update');
          return redirect()->back();
        }
      }

      public function setBill(Request $request){
        $id=$request['id'];
        
        // dd($request);
        $update=Orders::where('id',$id)->update([
          'bill'=>$request['bill'],
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
  
        if($update){
          Session::flash('success','Successfully Updated.');
          return redirect()->back();
        }else{
          Session::flash('error','Can not Update');
          return redirect()->back();
        }
      }

      public function setEta(Request $request){
        $id=$request['id'];
        
        // dd($request);
        $update=Orders::where('id',$id)->update([
          'eta'=>$request['eta'],
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
  
        if($update){
          Session::flash('success','Successfully Updated.');
          return redirect()->back();
        }else{
          Session::flash('error','Can not Update');
          return redirect()->back();
        }
      }
  
      public function insert(){
  
      }
  
      public function update(Request $request){
        $id=$request['id'];
        
        // dd($request);
        $update=Orders::where('id',$id)->update([
          'complete_file'=>$request['complete_file'],
          'status'=>'2',
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
  
        if($update){
          Session::flash('success','Successfully Uploaded.');
          return redirect('/admin/orders');
        }else{
          Session::flash('error','Can not Upload the file');
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
