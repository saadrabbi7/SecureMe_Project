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
            <form style="margin-left: 10px" class="form-horizontal" action="{{ route('ambulances.store') }}" role="form" method="post">
                @csrf 
                <div class="form-group row">
                    <label for="location" class="col-sm-2 pt-2">Locations</label>
                    <div class="col-sm-10">
                        <select name="location_id" class="form-control" required>
                            <option value="">Choose Location</option>
                            @isset($location)
                                @foreach ($location as $item)
                                    <option value="{{ $item->id }}">
                                        @if(isset($item->division))
                                            {{ isset($item) ? ($item->division.', '.$item->district.', '.$item->area) : null }}
                                        @else                                          
                                            {{ isset($item) ? ($item->district.', '.$item->area) : null }}
                                        @endif
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="organization_name" class="col-sm-2 pt-2">Organization Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="organization_name" name="organization_name" class="form-control" placeholder="Enter Organization Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="driver_name" class="col-sm-2 pt-2">Driver Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="driver_name" name="driver_name" class="form-control" placeholder="Enter Driver Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="driver_number" class="col-sm-2 pt-2">Organization Number</label>
                    <div class="col-sm-10">
                        <input type="number" id="driver_number" name="driver_number" class="form-control" placeholder="Enter Driver Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-2 pt-2">Type</label>
                    <div class="col-sm-10">
                        <select name="type" id="type" class="form-control">
                            <option value="">Select Ambulance Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-2 pt-2"></label>
                    <div class="col-sm-10">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-save"></i>  Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 

