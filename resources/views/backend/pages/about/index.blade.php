@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">About Table</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Cover Image
                    </th>
                    <th>
                      Title
                    </th>
                    <th>
                      Details
                    </th>
                    <th>
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($abouts as $about)
                  <tr>
                    <td class="py-1">
                      <img src="{{asset('storage/images/admin/about/'.$about['image'])}}" alt="image"/>
                    </td>
                    <td>
                     {{$about['title']}}
                    </td>
                    <td>
                        {{ Str::limit($about['details'], 50) }}
                    </td>
                    <td>
                      <a href="{{url('admin/about/edit',$about['id'])}}" style="font-size:1.3rem" title="Edit"><i class="mdi mdi-table-edit"></i></a>
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
