@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <form method="post" action="{{url('url')}}">
            @csrf
                <div class="row">
                    <div class="col-md-10">
                        <input name="destination"  placeholder="Please enter a URL" type="url" class="form-control" id="url-input" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit"  class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-6">
        <div class="row">
        <div class="col-md-10">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
        </div>
        <div>
        </div>
    </div>
</div>
@endsection