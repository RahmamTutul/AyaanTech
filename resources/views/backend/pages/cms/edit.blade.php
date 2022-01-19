@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
<div class="content-wrapper">
  <div class="col-md-8 grid-margin stretch-card  m-auto ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary"">New  CMS</h4>
        <div class="mb-3">
          @foreach ($errors->all() as $error)
              <li style="color: red">{{ $error }}</li>
          @endforeach
        </div>
        <form class="forms-sample" action="{{'/admin/cms/edit/'.$cms->id}}" method="POST">@csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" name="title" class="form-control" id="exampleInputUsername2" value="{{$cms->title}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Meta Title</label>
            <div class="col-sm-9">
              <input type="text" name="meta_title" class="form-control" id="exampleInputUsername2" value="{{$cms->meta_title}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
              <textarea name="description" id="" cols="30" rows="10" class="form-control" id="exampleInputUsername2">{{$cms->description}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Meta Description</label>
            <div class="col-sm-9">
              <textarea name="meta_description" id="" cols="30" rows="10" class="form-control" id="exampleInputUsername2">{{$cms->meta_description}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Meta Keywords</label>
            <div class="col-sm-9">
              <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control" id="exampleInputUsername2">{{$cms->meta_keywords}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">URL</label>
            <div class="col-sm-9">
              <input type="text"  name="url" class="form-control" id="exampleInputEmail2" value="{{$cms->url}}">
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
