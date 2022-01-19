<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CMS;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index(){
        $cmss = CMS::get()->toArray();
     //    dd($cmsInfos);
        return view('backend.pages.cms.index')->with(compact('cmss'));
     }
     public function create(Request $request){
         if($request->isMethod('post')){
             $data= $request->all();
              $request->validate([
                 'title'=>'required',
                 'url'=>'required',
                 'meta_title'=>'required',
                 'description'=>'required',
                 'meta_description'=>'required',
                 'meta_keywords'=>'required',
              ]);
             $Info= new CMS;
             $Info->title=$data['title'];
             $Info->url=$data['url'];
             $Info->meta_title=$data['meta_title'];
             $Info->description=$data['description'];
             $Info->meta_description=$data['meta_description'];
             $Info->meta_keywords=$data['meta_keywords'];
             $Info->save();
             Toastr::success("Uploaded successfully!",'Success!');
             return redirect('admin/cms/index');die;
         }
         return view('backend.pages.cms.add');
 
     }
 
     public function Edit(Request $request, $id){
       $cms= CMS::find($id);
       if($request->isMethod('post')){
         $data= $request->all();
         $request->validate([
            'title'=>'required',
            'url'=>'required',
            'meta_title'=>'required',
            'description'=>'required',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
         ]);
        $cms->title=$data['title'];
        $cms->url=$data['url'];
        $cms->meta_title=$data['meta_title'];
        $cms->description=$data['description'];
        $cms->meta_description=$data['meta_description'];
        $cms->meta_keywords=$data['meta_keywords'];
        $cms->save();
        Toastr::success("Updated successfully!" ,'Success!');
        return redirect('admin/cms/index');die;
       }
       return view('backend.pages.cms.edit')->with(compact('cms'));
     }
     public function delete($id){
         CMS::find($id)->delete();
         Toastr::success("Deleted!",'Success!');
         return redirect()->back();die;
     }
}
