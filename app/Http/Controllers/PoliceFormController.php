<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PoliceFormController extends Controller
{
    public function generatePoliceForm($id){
        $data = DB::table('rents')
            ->join('posts','rents.post_id','posts.id')
            ->join('users','rents.tenant_id','users.id')
            ->select('rents.id','posts.*','users.*')
            ->where('rents.id',$id)
            ->get();
//        return $data;
        $pdf = Pdf::loadView('policeForm.police_form',[
            'data'=>$data,
        ]);
        return $pdf->stream('police-form.pdf');
    }

    public function downloadPoliceForm($id){
        $data = DB::table('rents')
            ->join('posts','rents.post_id','posts.id')
            ->join('users','rents.tenant_id','users.id')
            ->select('rents.*','posts.*','users.*')
            ->where('rents.id',$id)
            ->get();
//        return $data;
        $pdf = Pdf::loadView('policeForm.police_form',[
            'data'=>$data,
        ]);
        return $pdf->download('police-form.pdf');
    }
}
