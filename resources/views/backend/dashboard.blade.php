@extends('backend.layouts.master')
@push('css')
  <link href="{{ asset('') }}assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center text-muted">Welcome <span class="text-dark"></h2></span>
            <h2 class="text-center">{{ Auth::user()->name }} Dashboard</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 p-1">
            <div class="card">
                <a href="{{ url('/users') }}">
                    <div class="card-body d-inline-flex justify-content-center">
                        <i class="bi bi-people text-danger mr-2 mt-2" style="font-size: 45px;"></i>
                        <div class="ml-2">
                            <h2 class="text-primary">{{ $totalMembers ?? 0 }}</h2>
                            <p class="text-dark">Total Register Members</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3 p-1">
            <div class="card">
                <a href="{{ url('/blood-banks') }}">
                    <div class="card-body d-inline-flex justify-content-center">
                        <i class="bi bi-emoji-smile text-primary mr-2 mt-2" style="font-size: 45px;"></i>
                        <div class="ml-2">
                            <h2 class="text-primary">{{ $donars ?? 0 }}</h2>
                            <p class="text-dark">Blood Donars</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3 p-1">
            <div class="card">
                <a href="{{ url('/ambulances') }}">
                    <div class="card-body d-inline-flex justify-content-center">
                        <i class="bi bi-cart-plus text-warning mr-2 mt-2" style="font-size: 45px;"></i>
                        <div class="ml-2">
                            <h2 class="text-primary">{{ $ambulances ?? 0 }}</h2>
                            <p class="text-dark">Ambulances</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3 p-1">
            <div class="card">
                <a href="{{ url('/contacts') }}">
                    <div class="card-body d-inline-flex justify-content-center">
                        <i class="bi bi-headset text-success mr-2 mt-2" style="font-size: 45px;"></i>
                        <div class="ml-2">
                            <h2 class="text-primary">{{ $contacts ?? 0 }}</h2>
                            <p class="text-dark">Users Support</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
