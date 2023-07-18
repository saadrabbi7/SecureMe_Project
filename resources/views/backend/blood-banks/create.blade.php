@extends('backend.layouts.master')

@section('content')
<div class="container-fluid">  
    <div class="card">
        <div class="card-header">
            <div class="text-center">
                <span class="m-0 text-info" style="font-size: 30px;text-align: center; margin-right: auto;">Blood Banks</span>
            </div>
            <a class="btn btn-sm btn-outline-success" class="m-0 float-right" href="{{route('blood-banks.index')}}">
                <span class="mdi mdi-playlist-plus"> List</span>
            </a>
        </div>
        <div class="card-body">
            <form style="margin-left: 10px" class="form-horizontal" action="{{ route('blood-banks.store') }}" role="form" method="post">
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
                    <label for="person_name" class="col-sm-2 pt-2">Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="person_name" name="person_name" class="form-control" placeholder="Enter Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone_number" class="col-sm-2 pt-2">Number</label>
                    <div class="col-sm-10">
                        <input type="number" id="phone_number" name="phone_number" class="form-control" placeholder="Enter Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="blood_group" class="col-sm-2 pt-2">Blood Group</label>
                    <div class="col-sm-10">
                        <select name="blood_group" id="blood_group" class="form-control">
                            <option value="">Select Blood Group</option>
                            @foreach ($bloodGroups as $bloodGroup)
                                <option value="{{ $bloodGroup }}">{{ $bloodGroup }}</option>
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

