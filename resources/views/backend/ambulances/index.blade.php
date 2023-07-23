@extends('backend.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="text-center">
                <span class="m-0 text-info text-center" style="font-size: 30px; margin-right: auto;">Ambulances</span>
            </div>
            <a class="btn btn-sm btn-outline-success" class="m-0 float-right" href="{{ route('ambulances.create') }}">
                <span class="mdi mdi-plus"> Create</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable-buttons" class="table table-hover">
                    <thead class="bg-success text-white text-center">
                        <tr class="tableHeader">
                            <th>SL</th>
                            <th>Location</th>
                            <th>Organization Name</th>
                            <th>Driver Name</th>
                            <th>Organization Number</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($ambulances)
                            @foreach ($ambulances as $ambulance)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        @if(isset($ambulance->location->division))
                                            {{ isset($ambulance->location) ? ($ambulance->location->division.', '.$ambulance->location->district.', '.$ambulance->location->area) : null }}
                                        @else                                          
                                            {{ isset($ambulance->location) ? ($ambulance->location->district.', '.$ambulance->location->area) : null }}
                                        @endif
                                    </td>
                                    <td>{{ $ambulance->organization_name }}</td>
                                    <td>{{ $ambulance->driver_name }}</td>
                                    <td>{{ $ambulance->driver_number }}</td>
                                    <td>{{ $ambulance->type }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('ambulances.show', $ambulance->id) }}"
                                            class="btn btn-sm btn-outline-info mr-1"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('ambulances.edit', $ambulance->id) }}"
                                            class="btn btn-sm btn-outline-primary mr-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('ambulances.destroy', $ambulance->id) }}" method="post">@csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are You Sure?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
