@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
<div class="content-wrapper">
  <div class="col-md-6 grid-margin stretch-card  m-auto ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary"">Add New  Banner</h4>
        <div class="mb-3">
          @foreach ($errors->all() as $error)
              <li style="color: red">{{ $error }}</li>
          @endforeach
        </div>
        <form class="forms-sample" action="{{'/admin/banner/store'}}" method="POST" enctype="multipart/form-data">@csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="Banner title">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Link</label>
            <div class="col-sm-9">
              <input type="text"  name="link" class="form-control" id="exampleInputEmail2" placeholder="Banner link">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Alternative</label>
            <div class="col-sm-9">
              <input type="text" name="alt" class="form-control" id="exampleInputMobile" placeholder="Image alternative">
            </div>
          </div>
          <div class="form-group row">
            <label for="Image" class="col-sm-3 col-form-label">Banner Image</label>
            <div class="col-sm-9">
              <input type="file" name="image" class="form-control" id="Image">
            </div>
          </div>
          <button id="AddNew" type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{url('admin/banner/index')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- content-wrapper ends -->
@stop

@push('script')

@endpush
