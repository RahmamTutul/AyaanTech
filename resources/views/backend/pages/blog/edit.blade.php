@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
<div class="content-wrapper">
  <div class="col-md-6 grid-margin stretch-card  m-auto ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary"">Update Blog</h4>
        <div class="mb-3">
          @foreach ($errors->all() as $error)
              <li style="color: red">{{ $error }}</li>
          @endforeach
        </div>
        <form class="forms-sample" action="{{'/admin/blog/edit/'.$blog['id']}}" method="POST" enctype="multipart/form-data">@csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" name="title" class="form-control" id="exampleInputUsername2" value="{{$blog['title']}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Subtitle</label>
            <div class="col-sm-9">
              <input type="text" name="sub_title" class="form-control" id="exampleInputUsername2" value="{{$blog['sub_title']}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="Image" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
              <input type="file" name="image" class="form-control" id="Image">
            </div>
            <img style="height: 200px; width:100%; margin-left:130px" src="{{asset('storage/images/admin/blog/'.$blog->image)}}" alt="broken" srcset="">
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Your name</label>
            <div class="col-sm-9">
              <input type="text" name="uploaded_by" class="form-control" id="exampleInputUsername2" value="{{$blog['Uploaded_by']}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Details</label>
            <div class="col-sm-9">
              <textarea name="details"  class="form-control" id="exampleInputUsername2" cols="30" rows="10">{{$blog['details']}}</textarea>
            </div>
          </div>
          <button id="AddNew" type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{url('admin/news/index')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- content-wrapper ends -->
@stop

@push('script')

@endpush
