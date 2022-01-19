@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
<div class="content-wrapper">
  <div class="col-md-8 grid-margin stretch-card  m-auto ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary"">New Packege</h4>
        <div class="mb-3">
          @foreach ($errors->all() as $error)
              <li style="color: red">{{ $error }}</li>
          @endforeach
        </div>
        <form class="forms-sample" action="{{'/admin/packege/add'}}" method="POST">@csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="Packege Title">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Packege Code</label>
            <div class="col-sm-9">
              <input type="text" name="code" class="form-control" id="exampleInputUsername2" placeholder=" Packege Code">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Details</label>
            <div class="col-sm-9">
              <textarea name="details" id="" cols="30" rows="10" class="form-control" id="exampleInputUsername2" placeholder="Packege details"></textarea>
            </div>
          <button id="AddNew" type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{url('admin/packege/index')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- content-wrapper ends -->
@stop

@push('script')

@endpush
