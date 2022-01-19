@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href="{{url('admin/cms/add')}}" class="btn btn-outline-primary btn-lg mb-4"> <i class="mdi mdi-account-multiple-plus pt-5"></i>&nbsp;&nbsp; ADD CMS</a>
            <h4 class="card-title">CMS Table</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                     Title
                    </th>
                    <th>
                     Meta title
                    </th>
                    <th>
                      Link
                    </th>
                    <th>
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cmss as $cms)
                  <tr>
                    <td>
                     {{$cms['title']}}
                    </td>
                    <td>
                     {{$cms['meta_title']}}
                    </td>
                    <td>
                        {{ Str::limit($cms['description'], 50) }}
                    </td>
                    <td>
                      <a href="{{url('admin/cms/edit',$cms['id'])}}" style="font-size:1.3rem" title="Edit"><i class="mdi mdi-table-edit"></i></a>
                      <a class="confirmDelete" href="{{url('admin/cms/delete',$cms['id'])}}" name="This CMS"style="font-size:1.3rem" title="Delete"><i class="mdi mdi-delete-forever"></i></a>
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
