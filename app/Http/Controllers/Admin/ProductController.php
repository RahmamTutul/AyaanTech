<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $products= product::get();
        return view('backend.pages.product.index')->with(compact('products'));
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            $data=new product;
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg|max:1024',
                'title'=>'required',
                'details'=>'required',
            ]);
            if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $currentDate=Carbon::now()->toDateString();
                $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('images/admin/product/'.$data->image))
                {
                Storage::disk('public')->makeDirectory('images/admin/product/'.$data->image);
                }
                $productImage = Image::make($image)->resize(800,600)->stream();
                Storage::disk('public')->put('images/admin/product/'.$imageName,$productImage);
                $data->image=$imageName;
            }else{
                $imageName= "default.png";
            }
            $data->title=$request->title;
            $data->details=$request->details;
            $data->status=1;
            $data->save();
            Toastr::success('Product Uploaded!','Success!');
            return redirect('admin/product/index');die;
        }
        
        return view('backend.pages.product.add');

    }

    public function edit(Request $request, $id){
      $product= product::find($id);
      if($request->isMethod('post')){
        $request->validate([
            'image'=>'mimes:png,jpg,jpeg|max:1024',
            'title'=>'required',
            'details'=>'required',
        ]);
        if($request->hasFile('image'))
        {

        $image=$request->file('image');
        $currentDate=Carbon::now()->toDateString();
        $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        if(Storage::disk('public')->exists('images/admin/product'))
        {
           Storage::disk('public')->makeDirectory('images/admin/product');
        }
        if(Storage::disk('public')->exists('images/admin/product/'.$product->image))
        {
           Storage::disk('public')->delete('images/admin/product/'.$product->image);
        }
        $productImage = Image::make($image)->resize(800,600)->stream();
        Storage::disk('public')->put('images/admin/product/'.$imageName,$productImage);
        $product->image=$imageName;
        }
        $product->title=$request->title;
        $product->details=$request->details;
        $product->status=1;
        $product->save();
        Toastr::success('product updated!','Success!');
        return redirect('admin/product/index');die;
      }
    return view('backend.pages.product.edit')->with(compact('product'));
    }
    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status']=='Active'){
                $status=0;
            }else{
                $status=1;
            }
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'id'=>$data['product_id']]);
        }

    }
    public function delete($id){
        $product=product::find($id);
        if(Storage::disk('public')->exists('images/admin/product/'.$product->image))
        {
           Storage::disk('public')->delete('images/admin/product/'.$product->image);
        }
        $product->delete();
        Toastr::success("Deleted!",'Success!');
        return redirect('admin/product/index');die;
    }
}
