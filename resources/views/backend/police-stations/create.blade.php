@extends('backend.layouts.master')

@section('content')
<div class="container-fluid">  
    <div class="card">
        <div class="card-header">
            <div class="text-center">
                <span class="m-0 text-info" style="font-size: 30px;text-align: center; margin-right: auto;">Police Station</span>
            </div>
            <a class="btn btn-sm btn-outline-success" class="m-0 float-right" href="{{route('police-stations.index')}}">
                <span class="mdi mdi-playlist-plus"> List</span>
            </a>
        </div>
        <div class="card-body">
            <form style="margin-left: 10px" class="form-horizontal" action="{{ route('police-stations.store') }}" role="form" method="post">
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
                    <label for="name" class="col-sm-2 pt-2">Station Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Police Station Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="station_number" class="col-sm-2 pt-2">Station Number</label>
                    <div class="col-sm-10">
                        <input type="text" name="station_number" class="form-control" placeholder="Enter Station Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="station_tel" class="col-sm-2 pt-2">Station Tel No</label>
                    <div class="col-sm-10">
                        <input type="text" id="station_tel" name="station_tel" class="form-control" placeholder="Enter Station Tel No">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 pt-2">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" rows="2" class="form-control" placeholder="Enter Description"></textarea>
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

