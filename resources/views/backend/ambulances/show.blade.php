@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    <span class="m-0 text-info" style="font-size: 30px;text-align: center; margin-right: auto;">Ambulances</span>
                </div>
                <a class="btn btn-sm btn-outline-success" class="m-0 float-right" href="{{route('ambulances.index')}}">
                    <span class="mdi mdi-playlist-plus"> List</span>
                </a>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2">Location</label>
                    <div class="col-sm-10">
                        {{ $data->location->division . ', ' . $data->location->district . ', ' . $data->location->area }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Organization Name</label>
                    <div class="col-sm-10">
                        {{ $data->organization_name ?? null }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Driver Name</label>
                    <div class="col-sm-10">
                        {{ $data->driver_name ?? null }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Organization Number</label>
                    <div class="col-sm-10">
                        {{ $data->driver_number ?? null }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Ambulance Type</label>
                    <div class="col-sm-10">
                        {{ $data->type ?? null }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
