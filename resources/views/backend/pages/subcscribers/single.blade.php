@extends('backend.layouts.app')
@push('style')
    
@endpush
@section('content')
    <div class="col-md-10 grid-margin stretch-card m-auto">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Massage Sent By. "{{$massage->name}}"</h4>
            <p class="card-description">
            Organization <code>{{$massage->organization}}</code>
            </p>
            <blockquote class="blockquote">
            <p class="mb-0">{{$massage->masssage}}</p>
            </blockquote>
        </div>
        <div class="card-body">
            <blockquote class="blockquote blockquote-primary">
            <p>Massage sent By..</p>
            <footer class="blockquote-footer">{{$massage->email}}</footer>
            </blockquote>
        </div>
        </div>
    </div>
@stop

@push('script')
    
@endpush
