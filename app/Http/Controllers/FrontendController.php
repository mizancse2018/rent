<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $status = DB::table('rents')
            ->join('posts','rents.post_id','posts.id')
            ->select('posts.id','posts.status','rents.booking_status')
            ->where('posts.status',1)
            ->where('rents.booking_status','')
            ->get();
//        dd($status);
        $posts = Post::with('image','rent')
            ->where('status',1)
            ->get();
//        return $posts;
        return view('frontEnd.home',[
            'posts'=>$posts,
            'status'=>$status,
        ]);
    }
    public function about(){
        return view('frontEnd.about');
    }
    public function properties(){
        return view('frontEnd.properties',[
            'posts'=>Post::get(),
        ]);
    }
    public function propertyDetails($id){
        return view('frontEnd.property_details',[
            'posts'=>Post::where('id',$id)->get(),
        ]);
    }
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ]);
        $search_txt = $request->search;
        $posts = Post::orderBy('id', 'desc')
            ->where('property_title', 'like', '%'.$search_txt.'%')
            ->orWhere('property_type', 'like', '%'.$search_txt.'%')
            ->orWhere('district', 'like', '%'.$search_txt.'%')
            ->orWhere('thana', 'like', '%'.$search_txt.'%')
            ->orWhere('area', 'like', '%'.$search_txt.'%')
            ->orWhere('price', 'like', '%'.$search_txt.'%')
            ->take(1000)->paginate(9);
        return view('frontEnd.property_search',[
            'posts'=> $posts,
        ]);
    }
    public function contact(){
        return view('frontEnd.contact');
    }
    public function contact_save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);
        Contact::create($request->all());
        return back()->with([
            'success' => 'Thank you for contact us. we will contact you shortly.'
        ]);
    }


}
