<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Packege;
use App\Models\Task;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PackegeController extends Controller
{
    public function index(){
        $packeges = Packege::get()->toArray();
        return view('backend.pages.packege.index')->with(compact('packeges'));
     }
     public function add(Request $request){
         if($request->isMethod('post')){
             $data= $request->all();
              $request->validate([
                 'title'=>'required',
                 'code'=>'required',
                 'details'=>'required',
              ]);
             $packege= new Packege();
             $packege->title=$data['title'];
             $packege->code=$data['code'];
             $packege->details=$data['details'];
             $packege->status=1;
             $packege->save();
             Toastr::success("Uploaded successfully!",'Success!');
             return redirect('admin/packege/index');die;
         }
         return view('backend.pages.packege.add');
 
     }
 
     public function edit(Request $request, $id){
       $packege= packege::find($id);
       if($request->isMethod('post')){
         $data= $request->all();
         $request->validate([
            'title'=>'required',
            'code'=>'required',
            'details'=>'required',
         ]);
         $packege->title=$data['title'];
         $packege->code=$data['code'];
         $packege->details=$data['details'];
         $packege->status=1;
         $packege->save();
        Toastr::success("Updated successfully!" ,'Success!');
        return redirect('admin/packege/index');die;
       }
       return view('backend.pages.packege.edit')->with(compact('packege'));
     }
     public function updatePackegeStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status']=='Active'){
                $status=0;
            }else{
                $status=1;
            }
            Packege::where('id',$data['packege_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'id'=>$data['packege_id']]);
        }

    }
     public function delete($id){
         packege::find($id)->delete();
         Task::where('packege_id',$id)->delete();
         Toastr::success("Deleted!",'Success!');
         return redirect()->back();die;
     }
}
