@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upload Avatar') }}</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="/upload" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" class="p-2 border rounded">
                            <button class="btn btn-primary">
                                Upload
                            </button>
                        </form>
                    </div>

                    <a href="{{route('employees')}}" class="btn btn-primary p-2 m-2">
                        Employees
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
