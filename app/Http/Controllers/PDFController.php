<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use Carbon\Carbon;
use Session;

use PDF;

class PDFController extends Controller
{
    public function generatePdf(Request $request) {
        
        $id=$request['id'];

        $order=Orders::where('user',Auth::user()->id)->where('id',$id)->firstOrFail();

        // dd($order);


        $complete_file = $order->complete_file;

        $pdf_content = [
            'title' => 'Completed Transcript for Order No: ',
            'date' => date('d/m/Y'),
            'text' => $complete_file,
        ];

        $pdf = PDF::loadView('frontend.zspdf', $pdf_content);

        return $pdf->download('zstudio-order-'.$id.'.pdf');
    }
}
