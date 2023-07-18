@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Edit User</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="post">@csrf
                        <div class="form-group row">
                            <label class="col-sm-2">Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name ?? null }}">
                            </div>
                            <label class="col-sm-2">Phone</label>
                            <div class="col-sm-4">
                                <input type="text" name="phone" id="phone" value="{{ $user->phone ?? null }}" class="form-control" readonly>
                            </div>
                        </div>                    
                        <div class="form-group row">
                            <label class="col-sm-2">Email</label>
                            <div class="col-sm-4">
                                <input type="text" name="email" id="email" value="{{ $user->email ?? null }}" class="form-control" readonly>
                            </div>
                            <label class="col-sm-2">Blood Group</label>
                            <div class="col-sm-4">
                                <select name="blood_group" id="blood_group" class="form-control" required>
                                    <option value="">Select Blood Group</option>
                                    @isset($bloodGroups)
                                        @foreach ($bloodGroups as $bloodGroup)
                                            <option value="{{ $bloodGroup }}" {{ ($user->blood_group == $bloodGroup) ? "selected" : "" }}>
                                                {{ $bloodGroup }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2">Set Admin</label>
                            <div class="col-sm-4">
                                <input type="radio" name="is_admin" id="is_admin" value="1" {{ ($user->is_admin == 1) ? "checked" : "" }}>
                                <label for="is_admin">Yes</label>    
                                <input type="radio" name="is_admin" id="is_admin" value="0" {{ ($user->is_admin == 0) ? "checked" : "" }}>
                                <label for="is_admin">No</label>    
                            </div>    
                        </div>                   
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success float-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
