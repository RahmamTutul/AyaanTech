<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index(){
        $abouts = About::all();
        return view('backend.pages.about.index')->with(compact('abouts'));
    }
    public function edit(Request $request, $id){
        $about= About::find($id);
        if($request->isMethod('post')){
          $data= $request->all();
          $request->validate([
             'title'=>'required',
             'details'=>'required',
             'image'=>'image|mimes:png,jpg,jpeg,svg|max:2048',
          ]);
          if($request->hasFile('image'))
          {
          $image=$request->file('image');
          $currentDate=Carbon::now()->toDateString();
          $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
          if(Storage::disk('public')->exists('images/admin/about/'.$about->image))
          {
             Storage::disk('public')->delete('images/admin/about/'.$about->image);
          }
          if(Storage::disk('public')->exists('images/admin/about/'.$about->image))
          {
             Storage::disk('public')->delete('images/admin/about/'.$about->image);
          }
          $aboutImage = Image::make($image)->resize(1500,1000)->stream();
          Storage::disk('public')->put('images/admin/about/'.$imageName,$aboutImage);
          $about->image=$imageName;
          }
         $about->title=$data['title'];
         $about->details=$data['details'];
         $about->url=Str::slug($data['title']);
         $about->save();
         Toastr::success("Updated successfully!" ,'Success!');
         return redirect('admin/about/index');
        }
        return view('backend.pages.about.edit')->with(compact('about'));
      }
}
