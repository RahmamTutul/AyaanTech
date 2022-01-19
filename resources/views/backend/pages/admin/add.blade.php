@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
<div class="content-wrapper">
  <div class="col-md-6 grid-margin stretch-card  m-auto ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary"">Add New  User</h4>
        <div class="mb-3">
          @foreach ($errors->all() as $error)
              <li style="color: red">{{ $error }}</li>
          @endforeach
        </div>
        <form class="forms-sample" action="{{'/admin/add-user'}}" method="POST" enctype="multipart/form-data">@csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" name="name" class="form-control" id="exampleInputUsername2" value="{{ old('name') }}" placeholder="Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email"  name="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
            <div class="col-sm-9">
              <input type="mobile" name="mobile" class="form-control" id="exampleInputMobile" placeholder="Mobile Number">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Role</label>
            <div class="col-sm-9">
              <select name="type" id="Type" class="form-control">
                     <option>Select Option</option>
                     <option value="Super Admin">Super Admin</option>
                     <option value="Admin">Admin</option>
                     <option value="Editor">Editor</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="Image" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
              <input type="file" name="image" class="form-control" id="Image">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="confirm" class="col-sm-3 col-form-label">Re Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="confirm" placeholder="Password">
            </div>
          </div>
          <button id="AddNew" type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{url('admin/all-users')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- content-wrapper ends -->
@stop

@push('script')

@endpush
