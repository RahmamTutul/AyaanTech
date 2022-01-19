<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Packege;
use App\Models\Task;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use function GuzzleHttp\Promise\task;

class TaskController extends Controller
{
    public function index($id){

        $tasks= Task::with(['packege'])->get();
        $packege= Packege::where('id',$id)->first();
        return view('backend.pages.task.index')->with(compact('tasks','packege'));

    }
    public function add(Request $request,$id){
            
            $data=$request->all();
            foreach($data['name'] as $key=>$value){
                $task=new Task;
                $image=$request->file('image')[$key];
                if(Storage::disk('public')->exists('images/admin/task'))
                {
                   Storage::disk('public')->makeDirectory('images/admin/task');
                }
                $currentDate=Carbon::now()->toDateString();
                $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $taskImage = Image::make($image)->resize(800,500)->stream();
                Storage::disk('public')->put('images/admin/task/'.$imageName,$taskImage);
                $task->image=$imageName;

                $task->packege_id=$id;
                $task->name=$data['name'][$key];
                $task->details=$data['details'][$key];
                $task->save();
            }
          
          Toastr::success('Tasks Uploaded!','Success!');
          return redirect()->back();die;
    }
    public function edit(Request $request, $id){
        $task= Task::find($id);
        if($request->isMethod('post')){
          $request->validate([
              'image'=>'mimes:png,jpg,jpeg|max:5000',
              'name'=>'required',
              'details'=>'required',
          ]);
          if($request->hasFile('image'))
          {
  
          $image=$request->file('image');
          $currentDate=Carbon::now()->toDateString();
          $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
          if(!Storage::disk('public')->exists('images/admin/task'))
            {
                Storage::disk('public')->makeDirectory('images/admin/task');
            }
          if(Storage::disk('public')->exists('images/admin/task/'.$task->image))
          {
             Storage::disk('public')->delete('images/admin/task/'.$task->image);
          }
          $serviceImage = Image::make($image)->resize(800,500)->stream();
          Storage::disk('public')->put('images/admin/services/'.$imageName,$serviceImage);
          $task->image=$imageName;
          }
          $task->name=$request->name;
          $task->details=$request->details;
          $task->save();
         Toastr::success("Updated successfully!" ,'Success!');
         return redirect()->back();die;
        }
      return view('backend.pages.task.edit')->with(compact('task'));
      }
      public function delete($id){
        $task=Task::find($id);
        if(Storage::disk('public')->exists('images/admin/task/'.$task->image))
        {
           Storage::disk('public')->delete('images/admin/task/'.$task->image);
        }
        $task->delete();
        Toastr::success("Deleted!",'Success!');
        return redirect()->back();die;
    }
}
