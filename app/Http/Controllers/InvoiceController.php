<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function generateInvoice($id){
        $data = DB::table('rents')
            ->join('posts','rents.post_id','posts.id')
            ->join('owners','rents.owner_id','owners.id')
            ->select('rents.*','posts.property_type','posts.floor','posts.holding','posts.road','posts.area','posts.district','posts.price','owners.name','owners.sign')
            ->where('rents.id',$id)
            ->get();
//        return $data;
        $pdf = Pdf::loadView('invoice.booking_invoice',[
            'data'=>$data,
        ]);
        return $pdf->stream('booking_invoice.pdf');
    }

    public function downloadInvoice($id){
        $data = DB::table('rents')
            ->join('posts','rents.post_id','posts.id')
            ->join('owners','rents.owner_id','owners.id')
            ->select('rents.*','posts.property_type','posts.floor','posts.holding','posts.road','posts.area','posts.district','posts.price','owners.name','owners.sign')
            ->where('rents.id',$id)
            ->get();
//        return $data;
        $pdf = Pdf::loadView('invoice.booking_invoice',[
            'data'=>$data,
        ]);
        return $pdf->download('booking_invoice.pdf');
    }
}
