<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $blogs= Blog::get();
        return view('backend.pages.blog.index')->with(compact('blogs'));
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            $data=new Blog;
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg|max:1024',
                'title'=>'required',
                'sub_title'=>'required',
                'details'=>'required',
                'uploaded_by'=>'required',
            ]);
            if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $currentDate=Carbon::now()->toDateString();
                $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('images/admin/blog/'.$data->image))
                {
                Storage::disk('public')->makeDirectory('images/admin/blog/'.$data->image);
                }
                $blogImage = Image::make($image)->resize(1200,900)->stream();
                Storage::disk('public')->put('images/admin/blog/'.$imageName,$blogImage);
                $data->image=$imageName;
            }else{
                $imageName= "default.png";
            }
            $data->title=$request->title;
            $data->sub_title=$request->sub_title;
            $data->details=$request->details;
            $data->uploaded_by=$request->uploaded_by;
            $data->url=Str::slug($request->title);
            $data->status=1;
            $data->save();
            Toastr::success('Blog Uploaded!','Success!');
            return redirect('admin/blog/index');die;
        }
        
        return view('backend.pages.blog.add');die;

    }

    public function edit(Request $request, $id){
      $blog= Blog::find($id);
      if($request->isMethod('post')){
        $request->validate([
            'title'=>'required',
            'sub_title'=>'required',
            'details'=>'required',
            'uploaded_by'=>'required',
        ]);
        if($request->hasFile('image'))
        {

        $image=$request->file('image');
        $currentDate=Carbon::now()->toDateString();
        $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        if(Storage::disk('public')->exists('images/admin/blog'))
        {
           Storage::disk('public')->makeDirectory('images/admin/blog');
        }
        if(Storage::disk('public')->exists('images/admin/blog/'.$blog->image))
        {
           Storage::disk('public')->delete('images/admin/blog/'.$blog->image);
        }
        $blogImage = Image::make($image)->resize(1200,900)->stream();
        Storage::disk('public')->put('images/admin/blog/'.$imageName,$blogImage);
        $blog->image=$imageName;
        }
        $blog->title=$request->title;
        $blog->sub_title=$request->sub_title;
        $blog->details=$request->details;
        $blog->uploaded_by=$request->uploaded_by;
        $blog->url=Str::slug($request->title);
        $blog->status=1;
        $blog->save();
        Toastr::success('Blog updated!','Success!');
        return redirect('admin/blog/index');die;
      }
    return view('backend.pages.blog.edit')->with(compact('blog'));
    }
    public function updateBlogStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status']=='Active'){
                $status=0;
            }else{
                $status=1;
            }
            Blog::where('id',$data['blog_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'id'=>$data['blog_id']]);
        }

    }
    public function delete($id){
        $blog=Blog::find($id);
        if(Storage::disk('public')->exists('images/admin/blog/'.$blog->image))
        {
           Storage::disk('public')->delete('images/admin/blog/'.$blog->image);
        }
        $blog->delete();
        Toastr::success("Deleted!",'Success!');
        return redirect('admin/blog/index');die;
    }
}
