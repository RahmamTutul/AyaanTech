@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row   m-auto">
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-primary"">Your profile</h4>
                <div class="form-group row">
                    <img class="m-auto" style="height: 100px; margin-top:15px; border-radius:50%" src="{{asset('storage/images/admin/avatar/'.$user->image)}}" alt="No image" srcset="">
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" readonly  class="form-control" id="exampleInputEmail2" value="{{$user->email }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" readonly class="form-control" id="exampleInputUsername2" value="{{$user['name'] }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                    <div class="col-sm-9">
                      <input type="text" readonly class="form-control" id="exampleInputMobile" value="{{$user->mobile }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control" id="exampleInputMobile" value="{{$user->type }}">
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-primary"">Change password</h4>
                <div class="mb-3">
                  @foreach ($errors->all() as $error)
                      <li style="color: red">{{ $error }}</li>
                  @endforeach
                </div>
                <form class="forms-sample" action="{{'/admin/settings/'.$user['id']}}" method="POST">@csrf
                  <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Old Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="old" id="old" class="form-control" password={{encrypt($user['password'])}} id="password" placeholder="Old Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="confirm" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="new" class="form-control" id="new" placeholder="New Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="confirm" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="password" class="form-control" id="confirm" placeholder="Confirm Password">
                    </div>
                  </div>
                  <button id="submit" type="submit" class="btn btn-primary mr-2">Submit</button>
                  <a href="{{url('admin/all-users')}}" class="btn btn-light">Cancel</a>
                </form>
              </div>
            </div>
          </div>
    </div>
 
</div>
  <!-- content-wrapper ends -->
@stop

@push('script')

@endpush
