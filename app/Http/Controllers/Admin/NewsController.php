<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(){
        $newses= News::get();
        return view('backend.pages.news.index')->with(compact('newses'));
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            $data=new News;
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg|max:1024',
                'title'=>'required',
                'sub_title'=>'required',
                'details'=>'required',
                'link'=>'required',
            ]);
            if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $currentDate=Carbon::now()->toDateString();
                $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('images/admin/news/'.$data->image))
                {
                Storage::disk('public')->makeDirectory('images/admin/news/'.$data->image);
                }
                $NewsImage = Image::make($image)->resize(800,600)->stream();
                Storage::disk('public')->put('images/admin/news/'.$imageName,$NewsImage);
                $data->image=$imageName;
            }else{
                $imageName= "default.png";
            }
            $data->title=$request->title;
            $data->sub_title=$request->sub_title;
            $data->details=$request->details;
            $data->link=$request->link;
            $data->url=Str::slug($request->title);
            $data->status=1;
            $data->save();
            Toastr::success('News Uploaded!','Success!');
            return redirect('admin/news/index');die;
        }
        
        return view('backend.pages.news.add');

    }

    public function edit(Request $request, $id){
      $news= News::find($id);
      if($request->isMethod('post')){
        $request->validate([
            'title'=>'required',
            'sub_title'=>'required',
            'details'=>'required',
            'link'=>'required',
        ]);
        if($request->hasFile('image'))
        {

        $image=$request->file('image');
        $currentDate=Carbon::now()->toDateString();
        $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        if(Storage::disk('public')->exists('images/admin/news'))
        {
           Storage::disk('public')->makeDirectory('images/admin/news');
        }
        if(Storage::disk('public')->exists('images/admin/news/'.$news->image))
        {
           Storage::disk('public')->delete('images/admin/news/'.$news->image);
        }
        $newsImage = Image::make($image)->resize(800,600)->stream();
        Storage::disk('public')->put('images/admin/news/'.$imageName,$newsImage);
        $news->image=$imageName;
        }
        $news->title=$request->title;
        $news->sub_title=$request->sub_title;
        $news->details=$request->details;
        $news->link=$request->link;
        $news->url=Str::slug($request->title);
        $news->status=1;
        $news->save();
        Toastr::success('News updated!','Success!');
        return redirect('admin/news/index');die;
      }
    return view('backend.pages.news.edit')->with(compact('news'));
    }
    public function updateNewsStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status']=='Active'){
                $status=0;
            }else{
                $status=1;
            }
            News::where('id',$data['news_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'id'=>$data['news_id']]);
        }

    }
    public function delete($id){
        $news=News::find($id);
        if(Storage::disk('public')->exists('images/admin/news/'.$news->image))
        {
           Storage::disk('public')->delete('images/admin/news/'.$news->image);
        }
        $news->delete();
        Toastr::success("Deleted!",'Success!');
        return redirect('admin/News/index');die;
    }
}
