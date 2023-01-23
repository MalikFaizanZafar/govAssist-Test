@extends('layouts.app')

@section('content')
@if($url)
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-2">
            <button class="btn btn-primary">
             <a href="/url"class="text-white text-decoration-none">View All Urls</a>
            </button>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
            <div class="card-body">
             <h5 class="card-title">
                 Views Count : {{$url->views}}
            </h5>
            <h6>
                 URl changed from <span class="text-primary">{{$url->destination}}</span> to <span class="text-primary">{{$url->slug}}</span>
            </h6>
            <button class="btn btn-primary">
                <a target="_blank" href="{{$url->destination}}"class="text-white text-decoration-none">Open Link</a>
            </button>
            </div>
            </div>
        </div>
    </div>
</div>
@endif
@if($errors->any())
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        </div>
    </div>
</div>
@endif
@endsection