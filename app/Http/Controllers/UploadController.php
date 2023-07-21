<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Orders;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class UploadController extends Controller
{
    public function index(){
      return view('frontend.upload');
    }

    public function makeVideo(Request $request){
      $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

      if ($receiver->isUploaded() === false) {
         // file not uploaded
    }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('videos', $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    
    public function insert(Request $request){

      $file = makeVideo;
      
      $insert=Orders::insertGetId([
        'link'=>htmlentities($request['link']),
        'user'=>auth()->id(),
        'file'=>'/'.$path.'/'.$fileName,
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
        Session::flash('success','Successfully Uloadede.');
        return redirect('/orders/all');
      }else{
        Session::flash('error','Upload failed.');
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
