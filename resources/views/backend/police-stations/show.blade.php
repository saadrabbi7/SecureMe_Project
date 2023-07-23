@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    <span class="m-0 text-info" style="font-size: 30px;text-align: center; margin-right: auto;">Locations</span>
                </div>
                <a class="btn btn-sm btn-outline-success" class="m-0 float-right" href="{{route('police-stations.index')}}">
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
                    <label class="col-sm-2">Police Station Name</label>
                    <div class="col-sm-10">
                        {{ $data->name ?? null }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Station Phone Number</label>
                    <div class="col-sm-10">
                        @isset($data->station_number)
                            @foreach (json_decode($data->station_number) as $number)
                                <p>{{ $number }}</p>
                            @endforeach                            
                        @endisset
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Station Tel No</label>
                    <div class="col-sm-10">
                        {{ $data->station_tel ?? null }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Description</label>
                    <div class="col-sm-10">
                        {{ $data->description ?? null }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
