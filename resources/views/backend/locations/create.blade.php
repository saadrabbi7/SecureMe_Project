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
            <form style="margin-left: 10px" class="form-horizontal" action="{{ route('locations.store') }}" role="form" method="post">
                @csrf 
                <div class="form-group row">
                    <label for="division" class="col-sm-2 pt-2">Division</label>
                    <div class="col-sm-10">
                        <input type="text" id="division" name="division" class="form-control" placeholder="Enter Division">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="district" class="col-sm-2 pt-2">District</label>
                    <div class="col-sm-10">
                        <input type="text" id="district" name="district" class="form-control" placeholder="Enter District">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="area" class="col-sm-2 pt-2">Area</label>
                    <div class="col-sm-10">
                        <input type="text" id="area" name="area" class="form-control" placeholder="Enter Area">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postal_code" class="col-sm-2 pt-2">Postal Code</label>
                    <div class="col-sm-10">
                        <input type="text" id="postal_code" name="postal_code" class="form-control" placeholder="Enter Postal Code">
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

