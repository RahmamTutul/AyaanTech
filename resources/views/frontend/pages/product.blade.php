@extends('frontend.layouts.app')

@section('content')
<section id="single">
    <div class="container-fluid m-top single">
        <div class="row bg-gray-950 d-flex m-5" >
          <div class="col-md-6 p-0 img-overlay">
            <img src="{{asset('storage/images/admin/product/'.$product->image)}}" class="img-fluid">
          </div>
          <div class="col-md-6">
            <div class="card-block">
              <h4 class="card-title"> {{ $product->title }} </h4>
              <p class="card-text">{{$product->details}}</p>
              <a href="#contact" class="btn btn-outline-primary rounded-0"><i class="fa fa-share" aria-hidden="true"></i> Enquiry Now</a>
            </div>
          </div>
        </div>
    </div>          
</section>
<section id="contact">
    <form class="my-form pt-5 pb-5" action="{{url('/subscribe')}}" method="POST">@csrf
        <div class="container pt-5">
            <h1>Get In Tuch!</h1>
            <p class="my-4">If you have any work from me or any types of quries related to my institute, you can send me message from here. It's my pleasure to help you.</p>
            <ul>
            <li>
                <div class="grid grid-2">
                <input name="name" type="text" placeholder="Name" required>  
                <input name="organization" type="text" placeholder="Organization Name" required>
                </div>
            </li>
            <li>
                <div class="grid grid-2">
                <input name="email" type="email" placeholder="Email" required>
                <input name="phone" type="phone" placeholder="Enter Mobile Number " required>
                </div>
            </li>    
            <li>
                <textarea name="masssage" placeholder="Message"></textarea>
            </li>   
            <li>
                <input type="checkbox" id="terms">
                <label for="terms">To submit your massage. <a href="">Click the check box.</a></label>
            </li>  
            <li>
                <div class="grid grid-3">
                <div class="required-msg">REQUIRED FIELDS</div>
                <button class="btn-grid" type="submit" disabled>
                    <span class="back">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/email-icon.svg" alt="">
                    </span>
                    <span class="front"> SUBMIT</span>
                </button>
                <button class="btn-grid" type="reset" disabled>
                    <span class="back">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/eraser-icon.svg" alt="">
                    </span>
                    <span class="front">RESET</span>
                </button> 
                </div>
            </li>    
            </ul>
        </div>
    </form>
</section>
@endsection