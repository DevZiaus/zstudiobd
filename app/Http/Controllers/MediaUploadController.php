<?php

namespace App\Http\Controllers;

use App\Models\MediaUpload;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('frontend.media-uploads.create');
    }

    public function store(Request $request)
    {
        if ($request->upload_type === 'link') {
            return $this->storeLink($request);
        }

        return $this->storeFile($request);
    }

    private function storeLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'external_url' => 'required|url|max:2048',
            'order_id' => 'nullable|exists:orders,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $upload = MediaUpload::create([
            'user_id' => auth()->id(),
            'type' => 'link',
            'title' => $request->title,
            'external_url' => $request->external_url,
            'status' => 'pending'
        ]);

        if ($request->has('order_id')) {
            $order = Order::find($request->order_id);
            if ($order) {
                $order->update([
                    'media_upload_id' => $upload->id,
                    'uploader_id' => auth()->id()
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Link submitted successfully',
            'upload' => $upload
        ]);
    }

    private function storeFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'media_file' => [
                'required',
                'file',
                'mimetypes:video/*,audio/*',
                'max:512000'
            ],
            'order_id' => 'nullable|exists:orders,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $file = $request->file('media_file');
        $path = $file->store('uploads', 'public');

        $upload = MediaUpload::create([
            'user_id' => auth()->id(),
            'type' => 'file',
            'title' => $request->title,
            'file_path' => $path,
            'file_size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'status' => 'pending'
        ]);

        if ($request->has('order_id')) {
            $order = Order::find($request->order_id);
            if ($order) {
                $order->update([
                    'media_upload_id' => $upload->id,
                    'uploader_id' => auth()->id()
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'File uploaded successfully',
            'upload' => $upload
        ]);
    }

    public function index()
    {
        $uploads = MediaUpload::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);
            
        return view('media-uploads.index', compact('uploads'));
    }
    
    public function viewAllOrders(){
        $allOrders = Orders::where('uploader_id', auth()->id())->orderBy('id', 'DESC')->get();
        return view('frontend.clientOrder', compact('allOrders'));
    }

  
      public function view($id){
        $order=Orders::where('uploader_id', auth()->id())->where('id',$id)->firstOrFail();
        return view('frontend.clientSingleOrder',compact('order'));
      }
  
      public function softdelete(Request $request){
        
        
      }
}