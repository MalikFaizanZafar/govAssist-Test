@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center my-5">
        <button class="btn btn-primary">
            <a href="/url/create"class="text-white text-decoration-none">Add New Link</a>
        </button>
    </div>
</div>
@if(empty($urls))
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                        Urls not found
            </div>
        <div>
    </div>
</div>
@endif
@isset($urls)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table">
                <caption>List of URLs</caption>
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Shortened Link</th>
                    <th scope="col">Views Count</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $url)
                        <tr>
                            <th scope="row">{{ $url->id }}</th>
                            <td>{{ $url->destination }}</td>
                            <td>{{ $url->slug }}</td>
                            <td>{{ $url->views }}</td>
                            <td>
                             <a href="{{ url('url/'.$url->id) }}" class="link-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->
        </div>
    </div>
</div>
@endisset
@endsection
