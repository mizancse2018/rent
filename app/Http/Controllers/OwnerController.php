<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Owner;
use App\Models\Division;
use App\Models\District;
use App\Models\Area;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OwnerController extends Controller
{
    public function ownerDashboard(){
        return view('owner.owner_dashboard',[
            'tenants' =>Rent::where('owner_id',Auth::user()->id)->count('tenant_id'),
            'posts' =>Post::where('owner_id',Auth::user()->id)->count(),
            'rents' =>Rent::where('owner_id',Auth::user()->id)->where('booking_status','booked')->count(),
        ]);
    }
    public function ownerProfile(){
        return view('owner.owner_profile',[
            'owner' => Owner::where('id',Auth::user()->id )->get(),
        ]);
    }
    public function saveImage($request, $imageField){
        $image                  =  $request->file($imageField);
        $imageName              =  rand().'.'.$image->getClientOriginalExtension();
        $directory              = 'assets/dashboardAsset/img/owner/';
        $imgUrl                 =  $directory.$imageName;
        $image-> move($directory,$imageName);
        return $imgUrl;
    }
    public function editOwnerProfile(Request $request){

        $owner                  = Owner::find($request->id);
        if ($request->file('image')){
            if (isset($owner->image)){
                unlink($owner->image);
            }
            $owner->image = $this->saveImage($request,'image');
        }
        $owner->name             = $request->name;
        $owner->phone            = $request->phone;
        $owner->email            = $request->email;
        $owner->address          = $request->address;
        $owner->about            = $request->about;
        if ($request->file('nid_front')){
            if (isset($owner->nid_front)){
                unlink($owner->nid_front);
            }
            $owner->nid_front = $this->saveImage($request,'nid_front');
        }
        if ($request->file('nid_back')){
            if (isset($owner->nid_back)){
                unlink($owner->nid_back);
            }
            $owner->nid_back = $this->saveImage($request,'nid_back');
        }
        if ($request->file('sign')){
            if (isset($owner->sign)){
                unlink($owner->sign);
            }
            $owner->sign = $this->saveImage($request,'sign');
        }
        $owner->save();
        return back()->with('success', 'You have updated your profile');
    }
    public function addProperty(){
        $data['divisions'] = Division::get(["name", "id"]);
        return view('owner.add_property',$data);
    }
    public function fetchDistrict(Request $request){
        $data['districts'] = District::where("division_id", $request->division_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchArea(Request $request){
        $data['areas'] = Area::where("district_id", $request->district_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function saveProperty(Request $request){

        $division_data = Division::where('id',$request->division)->first();
        $district_data = District::where('id',$request->district)->first();
        $area_data = Area::where('id',$request->area)->first();

        $post =new Post([
            "owner_id" =>Auth::user()->id,
            "property_title" =>$request->property_title,
            "property_type" =>$request->property_type,
            "division" =>$division_data['name'],
            "district" =>$district_data['name'],
            "area" =>$area_data['name'],
            "thana" =>$request->thana,
            "post_code" =>$request->post_code,
            "road" =>$request->road,
            "price" =>$request->price,
            "holding" =>$request->holding,
            "floor" =>$request->floor,
            "bed" =>$request->bed,
            "bath" =>$request->bath,
            "balcony" =>$request->balcony,
            "description" =>$request->description,
        ]);
        $post->save();

        if($request->hasFile("images")){
            $files=$request->file("images");
            $i=1;
            foreach($files as $file){
                $imageName = time().$i++.'.'.$file->getClientOriginalExtension();
                $request['post_id']=$post->id;
                $request['image']=$imageName;
                $file->move(\public_path("/assets/frontEndAsset/img/propertyImages"),$imageName);
                Image::create($request->all());
            }
        }
        return back()->with('success', 'You have successfully posted the property');
    }
    public function edit($id)
    {
        $posts=Post::findOrFail($id);
        $data['divisions'] = Division::get(["name", "id"]);
        return view('owner.update_property',$data)->with('posts',$posts);
    }
    public function deleteImage($id){
        $images=Image::findOrFail($id);
        if (File::exists("images/".$images->image)) {
            File::delete("images/".$images->image);
        }

        Image::find($id)->delete();
        return back();
    }
    public function destroyProperty($id)
    {
        $posts=Post::findOrFail($id);
        $images=Image::where("post_id",$posts->id)->get();
        foreach($images as $image){
            if (File::exists("assets/frontEndAsset/propertyImages/images/".$image->image)) {
                File::delete("assets/frontEndAsset/propertyImages/images/".$image->image);
            }
        }
        $posts->delete();
        return back();
    }
    public function updateProperty(Request $request,$id)
    {
        $post=Post::findOrFail($id);
        $post->update([
            "property_title" =>$request->property_title,
            "property_type" =>$request->property_type,
            "division" =>$request->division,
            "district" =>$request->district,
            "area" =>$request->area,
            "thana" =>$request->thana,
            "post_code" =>$request->post_code,
            "road" =>$request->road,
            "price" =>$request->price,
            "holding" =>$request->holding,
            "floor" =>$request->floor,
            "bed" =>$request->bed,
            "bath" =>$request->bath,
            "balcony" =>$request->balcony,
            "description" =>$request->description,
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request["post_id"]=$id;
                $request["image"]=$imageName;
                $file->move(\public_path("/assets/frontEndAsset/img/propertyImages"),$imageName);
                Image::create($request->all());
            }
        }
        return back();
    }
    public function manageProperty(){
        return view('owner.manage_property',[
            'posts'=>Post::orderby('id','desc')->where('owner_id',Auth::user()->id )->get(),
        ]);
    }
    public function postDetails($id){
        return view('owner.post_details',[
            'posts'=>Post::orderby('id','desc')
            ->where('owner_id',Auth::user()->id )
            ->with('image')
            ->where('id',$id)
            ->get()
        ]);
    }
    public function rentHistory(){
        $rents = DB::table('rents')
            ->join('posts','rents.post_id','posts.id')
            ->join('users','rents.tenant_id','users.id')
            ->where('posts.owner_id',Auth::user()->id)
            ->select('rents.*','posts.property_type','posts.price','users.name')
            ->orderby('rents.id','desc')
            ->get();
        return view('owner.rent_history',[
            'rents'=>$rents,
        ]);
    }
}
