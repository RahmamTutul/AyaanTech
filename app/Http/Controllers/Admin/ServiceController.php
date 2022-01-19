<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
    public function index(){
        $services= Services::get();
        return view('backend.pages.services.index')->with(compact('services'));
    }
    public function create(Request $request){
        if($request->isMethod('post')){
            $data=new Services;
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg|max:5000',
                'name'=>'required',
                'description'=>'required',
            ]);
            if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $currentDate=Carbon::now()->toDateString();
                $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('images/admin/services/'.$data->image))
                {
                Storage::disk('public')->makeDirectory('images/admin/services/'.$data->image);
                }
                $serviceImage = Image::make($image)->resize(1200,900)->stream();
                Storage::disk('public')->put('images/admin/services/'.$imageName,$serviceImage);
                $data->image=$imageName;
            }else{
                $imageName= "default.png";
            }
            $data->name=$request->name;
            $data->parent_id=1;
            $data->description=$request->description;
            $data->url=Str::slug($request->name);
            $data->status=1;
            $data->save();
            Toastr::success('Service Uploaded!','Success!');
            return redirect('admin/service/index');die;
        }
        
        $items= Services::get();
        return view('backend.pages.services.add')->with(compact('items'));

    }

    public function Edit(Request $request, $id){
      $service= Services::find($id);
      if($request->isMethod('post')){
        $request->validate([
            'image'=>'mimes:png,jpg,jpeg|max:5000',
            'name'=>'required',
            'description'=>'required',
        ]);
        if($request->hasFile('image'))
        {

        $image=$request->file('image');
        $currentDate=Carbon::now()->toDateString();
        $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        if(Storage::disk('public')->exists('images/admin/services'))
        {
           Storage::disk('public')->makeDirectory('images/admin/services');
        }
        if(Storage::disk('public')->exists('images/admin/services/'.$service->image))
        {
           Storage::disk('public')->delete('images/admin/services/'.$service->image);
        }
        $serviceImage = Image::make($image)->resize(1200,900)->stream();
        Storage::disk('public')->put('images/admin/services/'.$imageName,$serviceImage);
        $service->image=$imageName;
        }
        $service->name=$request->name;
        $service->parent_id=1;
        $service->description=$request->description;
        $service->url=Str::slug($request->name);
        $service->status=1;
        $service->save();
       Toastr::success("Updated successfully!" ,'Success!');
       return redirect('admin/service/index');die;
      }
    $items= Services::get();
    return view('backend.pages.services.edit')->with(compact('service','items'));
    }
    public function updateServiceStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status']=='Active'){
                $status=0;
            }else{
                $status=1;
            }
            Services::where('id',$data['service_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'id'=>$data['service_id']]);
        }

    }
    public function delete($id){
        Services::where('parent_id',$id)->delete();
        Services::find($id)->delete();
        Toastr::success("Deleted!",'Success!');
        return redirect('admin/service/index');die;
    }
}
