@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href="{{url('admin/product/add')}}" class="btn btn-outline-primary btn-lg mb-4"> <i class="mdi mdi-account-multiple-plus pt-5"></i>&nbsp;&nbsp; ADD PRODUCT</a>
            <h4 class="card-title">PRODUCT TABLE</h4>
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
                      Description
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <td class="py-1">
                      <img src="{{asset('storage/images/admin/product/'.$product['image'])}}" alt="image"/>
                    </td>
                    <td>
                     {{$product['title']}}
                    </td>
                    <td>
                       {{Str::limit($product['details'], 60)}}
                     </td>
                    <td>
                      @if ($product['status']==1)
                      <a style="font-size:1.3rem"  class="updateProductStatus" id="product-{{$product['id']}}" product_id="{{$product['id']}}" href="javascript:void(0)" title="Mute"><i status="Active" class="mdi mdi-toggle-switch"></i></a>
                      @else
                      <a style="font-size:1.3rem"  class="updateProductStatus" id="product-{{$product['id']}}" product_id="{{$product['id']}}" href="javascript:void(0)" title="Unmute"><i status="Disable" class="mdi mdi-toggle-switch-off"></i></a>
                      @endif
                      <a href="{{url('admin/product/edit',$product['id'])}}" style="font-size:1.3rem" title="Edit"><i class="mdi mdi-table-edit"></i></a>
                      <a class="confirmDelete" href="{{url('admin/product/delete',$product['id'])}}" name="{{$product['name']}}"style="font-size:1.3rem" title="Delete"><i class="mdi mdi-delete-forever"></i></a>
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
