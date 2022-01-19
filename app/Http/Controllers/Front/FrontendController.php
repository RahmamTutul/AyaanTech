<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Frontend;
use App\Models\News;
use App\Models\Product;
use App\Models\Services;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index(){
        $about= About::first()->toArray();
        $services=Services::where('status',1)->latest()->limit(8)->get();
        $newses=News::where('status',1)->latest()->limit(6)->get();
        $products=Product::where('status',1)->latest()->limit(8)->get();
        return view('frontend.pages.index')->with(compact('about','services','newses','products'));
    }
    public function news($id){
        $news=News::find($id);
        return view('frontend.pages.news')->with(compact('news'));
    }
    public function product($id){
        $product=Product::find($id);
        return view('frontend.pages.product')->with(compact('product'));
    }
    public function service($id){
        $service=Services::find($id);
        return view('frontend.pages.service')->with(compact('service'));
    }
    public function subscription(Request $request){
        if($request->isMethod('post')){
            //  $request->validate([
            //     'name'=>'required',
            //     'organization'=>'required',
            //     'email'=>'required|unique:frontends',
            //     'phone'=>'required',
            //     'masssage'=>'required',
            //  ]);
            $subs= new Frontend;
            $subs->name=$request['name'];
            $subs->organization=$request['organization'];
            $subs->email=$request['email'];
            $subs->phone=$request['phone'];
            $subs->masssage=$request['masssage'];
            $subs->save();
            $massageData=[
                'name'      =>  $request->name,
                'email'      =>  $request->email,
                'organization' =>  $request->organization,
                'phone'      =>  $request->phone,
                'massage'   =>   $request->masssage
            ];

            Mail::send('backend.pages.mail',$massageData,function($massage){
                $massage->to('connect@yopmail.com')->subject('New Customer Equiry!.');
            });
            // Mail::to('connect@ayaantech.com.bd')->send(new SendMail($data));
            Toastr::success("We will response you soon!",'Massage sent!');
            return redirect()->back();die;
    }
 }
 public function terms(){
     return view('frontend.pages.terms');
 }
}
