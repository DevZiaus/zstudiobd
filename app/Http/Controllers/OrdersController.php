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
      $allOrders=Orders::orderBY('id', 'DESC')->get();
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
  
      public function insert(){
  
      }
  
      public function update(Request $request){
        $id=$request['id'];
        
        // dd($request);
        $update=Orders::where('id',$id)->update([
          'complete_file'=>$request['complete_file'],
          'status'=>'2',
          'ps_status'=>'2',
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
  
        if($update){
          Session::flash('success','Successfully Uploaded.');
          return redirect('/admin/orders');
        }else{
          Session::flash('error','Can not Upload the file');
          return redirect('/admin/orders/view/'.$id);
        }
      }
  
      public function softdelete(){
  
      }
  
      public function restore(){
  
      }
  
      public function delete(){
  
      }
}
