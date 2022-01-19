@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Massages</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                     Name
                    </th>
                    <th>
                     Email
                    </th>
                    <th>
                      Phone
                    </th>
                    <th>
                      Massage
                    </th>
                    <th>
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($massages as $massages)
                  <tr>
                    <td>
                     {{$massages['name']}}
                    </td>
                    <td>
                     {{$massages['email']}}
                    </td>
                    <td>
                     {{$massages['phone']}}
                    </td>
                    <td>
                        {{ Str::limit($massages['masssage'], 50) }}
                    </td>
                    <td>
                      <a href="{{url('admin/subs/view',$massages['id'])}}" style="font-size:1.3rem" title="View Massage"><i class="mdi mdi-eye"></i></a>
                      <a class="confirmDelete" href="{{url('admin/subs/delete',$massages['id'])}}" name="This massage"style="font-size:1.3rem" title="Delete"><i class="mdi mdi-delete-forever"></i></a>
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
