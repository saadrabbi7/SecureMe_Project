@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    <span class="m-0 text-info" style="font-size: 30px;text-align: center; margin-right: auto;">Locations</span>
                </div>
                <a class="btn btn-sm btn-outline-success" class="m-0 float-right" href="{{route('locations.index')}}">
                    <span class="mdi mdi-playlist-plus"> List</span>
                </a>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="division" class="col-sm-2">Division</label>
                    <div class="col-sm-10">
                        {{ $data->division ?? null }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="district" class="col-sm-2">District</label>
                    <div class="col-sm-10">
                        {{ $data->division ?? null }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="area" class="col-sm-2">Area</label>
                    <div class="col-sm-10">
                        {{ $data->area ?? null }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postal_code" class="col-sm-2">Postal Code</label>
                    <div class="col-sm-10">
                        {{ $data->postal_code ?? null }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
