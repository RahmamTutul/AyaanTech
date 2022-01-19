@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href="{{url('admin/banner/create')}}" class="btn btn-outline-primary btn-lg mb-4"> <i class="mdi mdi-account-multiple-plus pt-5"></i>&nbsp;&nbsp; ADD BANNER</a>
            <h4 class="card-title">Banners Table</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Bannerr Image
                    </th>
                    <th>
                      Title
                    </th>
                    <th>
                      Link
                    </th>
                    <th>
                      Alt
                    </th>
                    <th>
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($banners as $banner)
                  <tr>
                    <td class="py-1">
                      <img src="{{asset('storage/images/admin/banner/'.$banner['image'])}}" alt="image"/>
                    </td>
                    <td>
                     {{$banner['title']}}
                    </td>
                    <td>
                        {{ Str::limit($banner['link'], 20) }}
                    </td>
                    <td>
                      {{$banner['alt']}}
                     </td>
                    <td>
                      @if ($banner['status']==1)
                      <a style="font-size:1.3rem"  class="updateBannerStatus" id="banner-{{$banner['id']}}" banner_id="{{$banner['id']}}" href="javascript:void(0)" title="Mute"><i status="Active" class="mdi mdi-toggle-switch"></i></a>
                      @else
                      <a style="font-size:1.3rem"  class="updateBannerStatus" id="banner-{{$banner['id']}}" banner_id="{{$banner['id']}}" href="javascript:void(0)" title="Unmute"><i status="Disable" class="mdi mdi-toggle-switch-off"></i></a>
                      @endif
                      <a href="{{url('admin/banner/edit',$banner['id'])}}" style="font-size:1.3rem" title="Edit"><i class="mdi mdi-table-edit"></i></a>
                      <a class="confirmDelete" href="{{url('admin/banner/delete',$banner['id'])}}" name="This Banner"style="font-size:1.3rem" title="Delete"><i class="mdi mdi-delete-forever"></i></a>
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
