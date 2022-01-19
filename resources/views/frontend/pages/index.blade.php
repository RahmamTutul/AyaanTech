@extends('frontend.layouts.app')

@section('content')
<section id="service">
    <div class="services content">
        <div class="container-fluid">
            <div class="service-title d-flex justify-content-between">
                <div class="service-title-header">
                    <h2 style="color: #fff;">Services</h2>
                </div>
                <div class="view-all">
                    View all
                </div>
            </div>
            <div class="row" data-aos="zoom-in-down" data-aos-duration="1500">
                @foreach ($services as $key=>$service)
                <div class="col-md-3 col-lg-3 mb-3">
                    <div class="box p-5">
                        @if ($key==0)
                        <i style="color: #21256B;"  class="far fa-window-restore fa-5x mb-4"></i>
                        @elseif ($key==1)
                        <i style="color: #21256B;" class="fab fa-centos fa-5x mb-4"></i>
                        @elseif ($key==2)
                        <i style="color: #21256B;" class="fab fa-android  fa-5x mb-4"></i>
                        @elseif ($key==3)
                        <i style="color: #21256B;" class="far fa-images fa-5x mb-4"></i>
                        @elseif ($key==4)
                        <i style="color: #21256B;" class="fab fa-unity fa-5x mb-4"></i>
                        @elseif ($key==5)
                        <i style="color: #21256B;" class="fas fa-chart-bar fa-5x mb-4"></i>
                        @elseif ($key==6)
                        <i style="color: #21256B;" class="fas fa-search-plus fa-4x mb-4"></i>
                        @elseif ($key==7)
                        <i style="color: #21256B;" class="fas fa-video fa-5x mb-4"></i>
                        @endif
                        <h4>{{$service['name']}}</h4>
                        <p>{{$service['description']}}</p>
                        <a class="readmore" href="{{url('/service',$service['id'])}}"><span>Read More</span></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="about-us">
    <div class="about content">
        <div class="upper">
          <div class="logo">
            <div class="image">
              <div class="camp">
                <img src="{{asset('assets/frontend/uploads/24-7-mobile.gif')}}" alt="Image" id="tent" />
              </div>
            </div>
          </div>
          <div class="info">
            <h1 class="mb-3">ABOUT <span style="color: rgb(241, 148, 8);">ALT</span></h1>
            <p>{{$about['details']}}</p>
            <button class="btn my-2" style="color: #21256B;" ><b>See More</b></button>
          </div>
        </div>
      </div>
</section>
<section class="section gray-bg mt-5" id="blog">
    <div class="container-fluid content">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title mb-4">
                    <h1 style="color: #000; font: 2 rem; font-weight: 600;">OUR PRODUCTS</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $key=>$product)
            <div class="col-lg-3">
                <div class="blog-grid">
                    <div class="blog-img">
                        <div class="date">AVAILABLE</div>
                        <a href="{{url('/product',$product['id'])}}">
                            @if ($key==0)
                            <img  src="{{asset('assets/frontend/uploads/school.jpg')}}" title="School" alt="NO IMAGE">
                            @elseif ($key==1)
                            <img src="{{asset('assets/frontend/uploads/hospitalpg.jpg')}}" title="Hospitalpg" alt="NO IMAGE">
                            @elseif ($key==2)
                            <img src="{{asset('assets/frontend/uploads/e-learning_1-01.png')}}" title="E-learning" alt="NO IMAGE">
                            @elseif ($key==3)
                            <img src="{{asset('assets/frontend/uploads/1.jpg')}}" title="" alt="NO IMAGE">
                            @elseif ($key==4)
                            <img src="{{asset('assets/frontend/uploads/supermarket.jpg')}}" title="Supermarket" alt="NO IMAGE">
                            @elseif ($key==5)
                            <img src="{{asset('assets/frontend/uploads/officejpg.jpg')}}" title="Office" alt="NO IMAGE">
                            @elseif ($key==6)
                            <img src="{{asset('assets/frontend/uploads/istock2.jpg')}}" title="" alt="NO IMAGE">
                            @elseif ($key==7)
                            <img src="{{asset('assets/frontend/uploads/pharmacy.jpg')}}" title="Pharmacy" alt="NO IMAGE">
                            @endif
                        </a>
                    </div>
                    <div class="blog-info">
                        <h5><a href="{{url('/product',$product['id'])}}">{{$product['title']}}</a></h5>
                        <p>{{Str::limit($product['details'],50)}}</p>
                        <div class="btn-bar">
                            <a href="#contact" class="px-btn-arrow">
                                <span>Enquiry Now</span>
                                <i class="arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="packeges">
    <div class="packeges content">
        <div class="container-fluid">
            <div class="service-title d-flex justify-content-between">
                <div class="service-title-header">
                    <h2 style="color: #fff;">SOCIAL MEDIA MANAGEMENTS </h2>
                </div>
            </div>
            <div id="generic_price_table">   
                <section>
                    <div class="container">
                        <div class="row" id="show-more-item">
                          <div class="col-md-3" style="color: #21256B;">
                            <div class="generic_content clearfix">
                                <div class="generic_head_price clearfix">
                                    <div class="generic_head_content clearfix">
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>Packege 1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="generic_feature_list">
                                    <ul>
                                        <li><span>10</span> Posts in Social Media</li>
                                        <li><span>10</span> Promotion Banner</li>
                                        <li><span>+</span> Bonus post on festival</li>
                                        <li><span>2</span> Adds Design</li>
                                        <li><span>24/7</span> Support</li>
                                    </ul>
                                </div>
                                <div class="generic_price_btn clearfix">
                                    <a class="" href="#contact">Enroll Now</a>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-3" style="color: #21256B;">
                            <div class="generic_content clearfix">
                                <div class="generic_head_price clearfix">
                                    <div class="generic_head_content clearfix">
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>Packege 2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="generic_feature_list">
                                    <ul>
                                        <li><span>15</span> Posts in Social Media</li>
                                        <li><span>15</span> Promotion Banner</li>
                                        <li><span>++</span> Bonus post on festival</li>
                                        <li><span>2</span> Adds Design</li>
                                        <li><span>24/7</span> Support</li>
                                    </ul>
                                </div>
                                <div class="generic_price_btn clearfix">
                                    <a class="" href="#contact">Enroll Now</a>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-3" style="color: #21256B;">
                            <div class="generic_content clearfix">
                                <div class="generic_head_price clearfix">
                                    <div class="generic_head_content clearfix">
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>Packege 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="generic_feature_list">
                                    <ul>
                                        <li><span>20</span> Posts in Social Media</li>
                                        <li><span>20</span> Promotion Banner</li>
                                        <li><span>2x</span> Bonus post on festival</li>
                                        <li><span>5</span> Adds Design</li>
                                        <li><span>24/7</span> 1 customer support</li>
                                    </ul>
                                </div>
                                <div class="generic_price_btn clearfix">
                                    <a class="" href="#contact">Enroll Now</a>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-3" style="color: #21256B;">
                            <div class="generic_content clearfix">
                                <div class="generic_head_price clearfix">
                                    <div class="generic_head_content clearfix">
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>Packege 4</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="generic_feature_list">
                                    <ul>
                                        <li><span>2GB</span> Bandwidth</li>
                                        <li><span>150GB</span> Storage</li>
                                        <li><span>12</span> Accounts</li>
                                        <li><span>7</span> Host Domain</li>
                                        <li><span>24/7</span> Support</li>
                                    </ul>
                                </div>
                                <div class="generic_price_btn clearfix">
                                    <a class="" href="#contact">Enroll Now</a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </section> 
            </div>
        </div>
    </div>
</section>
<section id="news">
    <section class="home-blog bg-sand">
        <div class="container-fluid content">
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-lg- col-md-8">
                    <div class="section-title text-center title-ex1">
                        <h2>NEWS & BLOG</h2>
                    </div>
                </div>
            </div>
            <div class="row ">
                @foreach ($newses as $news)
                    <div class="col-md-4">
                        <div class="media blog-media">
                        <a href="{{url('/news',$news['id'])}}"><img class="d-flex" src="{{asset('storage/images/admin/news/'.$news['image'])}}" alt="Generic placeholder image"></a>
                        <div class="circle">
                            <h5 class="day">14</h5>
                            <span class="month">sep</span>
                        </div>
                        <div class="media-body">
                            <a href="{{url('/news',$news['id'])}}"><h5 class="mt-0">{{$news['title']}}</h5></a>
                            {{Str::limit($news['details'],80)}}
                            <a href="#contact" class="post-link">Read More->></a>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
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