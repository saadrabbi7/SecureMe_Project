@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Users</h2>
                </div>
                <div class="card-body">
                    {{-- <a class="btn btn-primary mb-3" href="{{ route('user.create') }}"> Add User</a> --}}

                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-hover">
                            <thead class="bg-primary text-light">
                                <tr class="text-uppercase text-center">
                                    <th>SL#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Blood Group</th>
                                    <th>Address</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="">
                                @foreach ($users as $key=>$user)
                                <tr>
                                    <th scope="row" class="text-center">{{$key+1}}</th>
                                    <td>{{$user->name}} {!! ($user->is_admin == 1) ? "<span class='badge badge-primary'>Admin</span>" : "" !!}</td>
                                    <td>{{$user->phone}}</td>
                                    <td class="text-center">{{$user->blood_group}}</td>
                                    <td>{{ (isset($user->profile->area) && $user->profile->area != null) ? $user->profile->area.', ' : "" }} 
                                        {{ (isset($user->profile->district) && $user->profile->district != null) ? $user->profile->district.', ' : "" }}
                                        {{ (isset($user->profile->division) && $user->profile->division != null) ? $user->profile->division : "" }}
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{route('user.edit',$user->id)}}">
                                            <button class="btn btn-outline-success">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>&nbsp;

                                        <form class="tooltip-error text-center" data-rel="tooltip" title="Delete"
                                            action="{{route('user.destroy', $user->id)}}" method="post">
                                            @csrf
                                            {{-- @method('Delete') --}}
                                            <button class="btn btn-outline-danger" type="{{ ($user->is_admin == 1) ? "button" : "submit" }}" {{ ($user->is_admin == 1) ? "disabled" : "" }}  onclick="return confirm('Are you sure? you want to delete this user?');">
                                                <i class="ace-icon fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
