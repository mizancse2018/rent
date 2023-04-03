<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Owner;
use App\Models\Post;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.admin_dashboard',[
            'tenants' =>User::count(),
            'owners' =>Owner::count(),
            'posts' =>Post::count(),
            'rents' =>Rent::where('booking_status','booked')->count()
        ]);
    }

    public function adminProfile(){
        return view('admin.admin_profile',[
            'admin' => Admin::where('id',Auth::user()->id )->get(),
        ]);
    }public function saveImage($request, $imageField){
    $image                  =  $request->file($imageField);
    $imageName              =  rand().'.'.$image->getClientOriginalExtension();
    $directory              = 'assets/dashboardAsset/img/admin/';
    $imgUrl                 =  $directory.$imageName;
    $image-> move($directory,$imageName);
    return $imgUrl;
}
    public function editAdminProfile(Request $request){

        $admin                  = Admin::find($request->id);
        if ($request->file('image')){
            if (isset($admin->image)){
                unlink($admin->image);
            }
            $admin->image = $this->saveImage($request,'image');
        }
        $admin->name             = $request->name;
        $admin->phone            = $request->phone;
        $admin->email            = $request->email;
        $admin->address          = $request->address;
        $admin->about            = $request->about;
        if ($request->file('nid_front')){
            if (isset($admin->nid_front)){
                unlink($admin->nid_front);
            }
            $admin->nid_front = $this->saveImage($request,'nid_front');
        }
        if ($request->file('nid_back')){
            if (isset($admin->nid_back)){
                unlink($admin->nid_back);
            }
            $admin->nid_back = $this->saveImage($request,'nid_back');
        }
        if ($request->file('sign')){
            if (isset($admin->sign)){
                unlink($admin->sign);
            }
            $admin->sign = $this->saveImage($request,'sign');
        }
        $admin->save();
        return back()->with('success', 'You have updated your profile');
    }
    public function manageAdmin(){
        return view('admin.manage_admin',[
            'admins' => Admin::all()
        ]);
    }
    public function adminDetails($id){
        return view('admin.admin_details',[
            'admin' => Admin::where('id',$id )->get(),
        ]);
    }
    public function role($id){
        $admin = Admin::find($id);
        if ($admin->role==0){
            $admin->role=1;
            $admin->save();
            return back();
        }else{
            $admin->role=0;
            $admin->save();
            return back();
        }
    }
    public function manageOwner(){
        return view('admin.manage_owner',[
            'owners' => Owner::all()
        ]);
    }
    public function ownerDetails($id){
        return view('admin.owner_details',[
            'owner' => Owner::where('id',$id )->get(),
        ]);
    }
    public function ownerProfileStatus($id){
        $owner = Owner::find($id);
        if ($owner->profile_status==0){
            $owner->profile_status=1;
            $owner->save();
            return back();
        }else{
            $owner->profile_status=0;
            $owner->save();
            return back();
        }
    }
    public function manageTenant(){
      return view('admin.manage_tenant',[
          'tenants' => User::all()
      ]);
    }
    public function tenantDetails($id){
        return view('admin.tenant_details',[
            'user' => User::where('id',$id )->get(),
        ]);
    }
    public function tenantProfileStatus($id){
        $tenant = User::find($id);
        if ($tenant->profile_status==0){
            $tenant->profile_status=1;
            $tenant->save();
            return back();
        }else{
            $tenant->profile_status=0;
            $tenant->save();
            return back();
        }
    }
    public function propertyStatus($id){
        $post = Post::find($id);
        if ($post->status==0){
            $post->status=1;
            $post->save();
            return back();
        }else{
            $post->status=0;
            $post->save();
            return back();
        }
    }
    public function managePost(){
        return view('admin.manage_post',[
            'posts'=>Post::orderby('id','desc')->get(),
        ]);
    }
    public function rentHistory(){
        $rents = DB::table('rents')
            ->join('posts','rents.post_id','posts.id')
            ->join('users','rents.tenant_id','users.id')
            ->join('owners','rents.owner_id','owners.id')
            ->select('rents.*','posts.price','users.name','owners.email')
            ->get();
        return view('admin.rent_history',[
            'rents'=>$rents,
        ]);
    }
}
