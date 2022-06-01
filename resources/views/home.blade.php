@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @foreach($listUser as $data)
                    <p>{{$data->name}}</p>
                    <p>{{$data->email}}</p>
                    <p>{{$data->password}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
