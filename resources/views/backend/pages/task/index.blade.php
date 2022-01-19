@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href="javascript:void(0);" onclick="myFunction();" class="btn btn-outline-primary btn-lg mb-4"> <i class="mdi mdi-account-multiple-plus pt-5"></i>&nbsp;&nbsp; ADD TASK</a>
            <form  action="{{url('admin/packege/task/add',$packege['id'])}}" enctype="multipart/form-data" id="AddAttribute"  style="display: none" method="post" >
              @csrf
                  <div class="col-md-8">
                      <h3 class="mb-5">Upload {{$packege['title']}} Tasks</h3>
                      <div class="form-group field_wrapper">
                          <input type="text" class="form-control" id="name" name="name[]" placeholder="Task name" required/>
                          <input type="file" class="form-control mt-3" id="image" name="image[]" required/>
                          <textarea name="details[]" class="form-control" style="margin-top: 20px" id="details" cols="30" rows="10" placeholder="Tast details" required></textarea>
                          <a href="javascript:void(0);" class="btn add_button" style="color: blue" title="Add field">ADD</a>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button> <br>
                  </div>
            </form>
            <h4 class="card-title  mt-5">All Tasks From <b style="color: rebeccapurple"> &nbsp; &nbsp; {{$packege['title']}}</b></h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Image
                    </th>
                    <th>
                      Title
                    </th>
                    <th>
                       Packege
                    </th>
                    <th>
                      Details
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tasks as $task)
                  <tr>
                    <td class="py-1">
                      <img src="{{asset('storage/images/admin/task/'.$task['image'])}}" alt="image"/>
                    </td>
                    <td>
                     {{$task['name']}}
                    </td>
                    <td>
                      {{$packege['title']}}
                    </td>
                    <td>
                       {{Str::limit($task['details'], 40)}}
                     </td>
                    <td>
                      <a href="{{url('admin/packege/task/edit',$task['id'])}}" style="font-size:1.3rem" title="Edit"><i class="mdi mdi-table-edit"></i></a>
                      <a class="confirmDelete" href="{{url('admin/packege/task/delete',$task['id'])}}" name="{{$task['name']}}"style="font-size:1.3rem" title="Delete"><i class="mdi mdi-delete-forever"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
  <!-- content-wrapper ends -->
@stop

@push('script')
<script>
  function myFunction() {
       var x = document.getElementById("AddAttribute");
       if (x.style.display === "none") {
         x.style.display = "block";
       } else {
         x.style.display = "none";
       }
     }
</script>
@endpush
