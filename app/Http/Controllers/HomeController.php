<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rent;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }
    public function tenantDashboard(){
        return view('tenant.tenant_dashboard');
    }
    public function tenantProfile(){
        return view('tenant.tenant_profile',[
            'user' => User::where('id',Auth::user()->id )->get(),
        ]);
    }
    public function saveImage($request, $imageField){
        $image                  =  $request->file($imageField);
        $imageName              =  rand().'.'.$image->getClientOriginalExtension();
        $directory              = 'assets/dashboardAsset/img/tenant/';
        $imgUrl                 =  $directory.$imageName;
        $image-> move($directory,$imageName);
        return $imgUrl;
    }
    public function editTenantProfile(Request $request){

        $user                  = User::find($request->id);
        if ($request->file('image')){
            if (isset($user->image)){
                unlink($user->image);
            }
            $user->image = $this->saveImage($request,'image');
        }
        $user->name             = $request->name;
        $user->father_name      = $request->father_name;
        $user->phone            = $request->phone;
        $user->nid              = $request->nid;
        $user->dob              = $request->dob;
        $user->marital_status   = $request->marital_status;
        $user->religion         = $request->religion;
        $user->education        = $request->education;
        $user->occupation       = $request->occupation;
        $user->institution      = $request->institution;
        $user->email            = $request->email;
        $user->address          = $request->address;
        $user->about            = $request->about;
        $user->ec_name          = $request->ec_name;
        $user->ec_relationship  = $request->ec_relationship;
        $user->ec_phone         = $request->ec_phone;
        $user->ec_address       = $request->ec_address;
        $user->fm_name          = $request->fm_name;
        $user->fm_age           = $request->fm_age;
        $user->fm_occupation    = $request->fm_occupation;
        $user->fm_phone         = $request->fm_phone;
        $user->hw_name          = $request->hw_name;
        $user->hw_nid           = $request->hw_nid;
        $user->hw_phone         = $request->hw_phone;
        $user->hw_address       = $request->hw_address;
        $user->d_name           = $request->d_name;
        $user->d_nid            = $request->d_nid;
        $user->d_phone          = $request->d_phone;
        $user->d_address        = $request->d_address;
        $user->pho_name         = $request->pho_name;
        $user->pho_phone        = $request->pho_phone;
        $user->pho_address      = $request->pho_address;
        if ($request->file('nid_front')){
            if (isset($user->nid_front)){
                unlink($user->nid_front);
            }
            $user->nid_front = $this->saveImage($request,'nid_front');
        }
        if ($request->file('nid_back')){
            if (isset($user->nid_back)){
                unlink($user->nid_back);
            }
            $user->nid_back = $this->saveImage($request,'nid_back');
        }
        if ($request->file('sign')){
            if (isset($user->sign)){
                unlink($user->sign);
            }
            $user->sign = $this->saveImage($request,'sign');
        }
        $user->save();
        return back()->with('success', 'You have updated your profile');
    }
    public function takeRent($id){
        $post=Post::findOrFail($id);
        return view('tenant.take_rent',[
            'post'=>$post,
        ]);
    }
    public function rentHistory(){
        $rents = DB::table('rents')
            ->join('posts','rents.post_id','posts.id')
            ->join('owners','rents.owner_id','owners.id')
            ->where('rents.tenant_id',Auth::user()->id)
            ->select('posts.*','rents.*','owners.name')
            ->orderby('rents.id','desc')
            ->get();
        $today = Carbon::now()->format('d');
        return view('tenant.rent_history',[
            'rents'=>$rents,
            'today'=>$today,
        ]);
    }
    public function leaveRent($id){

        $rents = DB::table('rents')
            ->where('rents.id',$id)
            ->update([
                'leave_status'=> 'pending',
                'leave_date' => Carbon::now(),
            ]);
        return back();
    }
}
