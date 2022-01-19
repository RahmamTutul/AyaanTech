@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
<div class="content-wrapper">
  <div class="col-md-6 grid-margin stretch-card  m-auto ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary"">Add New  Service</h4>
        <div class="mb-3">
          @foreach ($errors->all() as $error)
              <li style="color: red">{{ $error }}</li>
          @endforeach
        </div>
        <form class="forms-sample" action="{{'/admin/service/create'}}" method="POST" enctype="multipart/form-data">@csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" name="name" class="form-control" id="exampleInputUsername2" placeholder="Service Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Belongs To</label>
            <div class="col-sm-9">
              <select name="parent_id" id="Type" class="form-control">
                  <option>Select Option</option>
                  <option value="0">Main</option>
                  @foreach ($items as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
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
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
              <textarea name="description"  class="form-control" id="exampleInputUsername2"></textarea>
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
