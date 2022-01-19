<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $massages=Frontend::latest()->get();
        return view('backend.pages.subcscribers.index')->with(compact('massages'));
    }
        public function delete($id){
            Frontend::find($id)->delete();
            Toastr::success("Deleted!",'Success!');
            return redirect()->back();die;
    }
    public function view($id){
        $massage= Frontend::find($id);
        return view('backend.pages.subcscribers.single')->with(compact('massage'));
    }
}
