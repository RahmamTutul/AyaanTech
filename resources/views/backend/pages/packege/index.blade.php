@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
           
          <div class="card-body">
            <a href="{{url('admin/packege/add')}}" class="btn btn-outline-primary btn-lg mb-4"> <i class="mdi mdi-account-multiple-plus pt-5"></i>&nbsp;&nbsp; ADD packege</a>
            <h4 class="card-title">Packege Table</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                     Title
                    </th>
                    <th>
                     Details
                    </th>
                    <th>
                      Packege Code
                    </th>
                    <th>
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($packeges as $packege)
                  <tr>
                    <td>
                     {{$packege['title']}}
                    </td>
                    <td>
                        {{ Str::limit($packege['details'], 50) }}
                    </td>
                    <td>
                        {{ $packege['code'] }}
                    </td>
                    <td>
                      @if ($packege['status']==1)
                      <a style="font-size:1.3rem"  class="updatePackegeStatus" id="packege-{{$packege['id']}}" packege_id="{{$packege['id']}}" href="javascript:void(0)" title="Mute"><i status="Active" class="mdi mdi-toggle-switch"></i></a>
                      @else
                      <a style="font-size:1.3rem"  class="updatePackegeStatus" id="packege-{{$packege['id']}}" packege_id="{{$packege['id']}}" href="javascript:void(0)" title="Unmute"><i status="Disable" class="mdi mdi-toggle-switch-off"></i></a>
                      @endif
                      <a href="{{url('admin/packege/edit',$packege['id'])}}" style="font-size:1.3rem" title="Edit"><i class="mdi mdi-table-edit"></i></a>
                      <a class="confirmDelete" href="{{url('admin/packege/delete',$packege['id'])}}" name="This packege"style="font-size:1.3rem" title="Delete"><i class="mdi mdi-delete-forever"></i></a>
                      <a id="addTask" href="{{url('admin/packege/task/index',$packege['id'])}}" style="font-size:1.3rem" title="Add tasks"><i class="mdi mdi-database-plus"></i></a>
                      
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
