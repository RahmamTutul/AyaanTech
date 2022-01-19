@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href="{{url('admin/add-user')}}" class="btn btn-outline-primary btn-lg mb-4"> <i class="mdi mdi-account-multiple-plus pt-5"></i>&nbsp;&nbsp; ADD USER</a>
            <h4 class="card-title">Users Table</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Avatar
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      phone
                    </th>
                    <th>
                      Role
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td class="py-1">
                      <img src="{{asset('storage/images/admin/avatar/'.$user['image'])}}" alt="image"/>
                    </td>
                    <td>
                     {{$user['name']}}
                    </td>
                    <td>
                      {{$user['email']}}
                    </td>
                    <td>
                      +88 {{$user['mobile']}}
                     </td>
                     <td>
                      {{$user['type']}}
                     </td>
                    <td>
                      @if (Auth::guard('admin')->user()->type=='Super admin')
                      @if ($user['status']==1)
                      <a style="font-size:1.3rem"  class="updateUserStatus" id="user-{{$user['id']}}" user_id="{{$user['id']}}" href="javascript:void(0)" title="Mute User"><i status="Active" class="mdi mdi-toggle-switch"></i></a>
                      @else
                      <a style="font-size:1.3rem"  class="updateUserStatus" id="user-{{$user['id']}}" user_id="{{$user['id']}}" href="javascript:void(0)" title="Unmute User"><i status="Disable" class="mdi mdi-toggle-switch-off"></i></a>
                      @endif
                      <a href="{{url('admin/edit-user',$user['id'])}}" style="font-size:1.3rem" title="Edit"><i class="mdi mdi-table-edit"></i></a>
                      <a class="confirmDelete" href="{{url('admin/delete-user',$user['id'])}}" name="{{$user['name']}}"style="font-size:1.3rem" title="Delete"><i class="mdi mdi-delete-forever"></i></a>
                      @endif
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
    
@endpush
