@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
<div class="content-wrapper">
  <div class="col-md-6 grid-margin stretch-card  m-auto ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary"">Update About</h4>
        <div class="mb-3">
          @foreach ($errors->all() as $error)
              <li style="color: red">{{ $error }}</li>
          @endforeach
        </div>
        <form class="forms-sample" action="{{'/admin/about/edit/'.$about->id}}" method="POST" enctype="multipart/form-data">@csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" name="title" class="form-control" id="exampleInputUsername2" value="{{$about->title}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Details</label>
            <div class="col-sm-9">
              <textarea   name="details" class="form-control" id="" cols="30" rows="10">{{$about->details}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="Image" class="col-sm-3 col-form-label">Cover Image</label>
            <div class="col-sm-9">
              <input type="file" id="Image" name="image" class="form-control" id="Image">
            </div>
            <img style="height: 90px; width:150px; margin-left:130px" src="{{asset('storage/images/admin/about/'.$about->image)}}" alt="broken" srcset="">
          </div>
          <button id="AddNew" type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{url('admin/about/index')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- content-wrapper ends -->
@stop

@push('script')

@endpush
