@extends('backend.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="text-center">
            <span class="m-0 text-info" style="font-size: 30px;text-align: center; margin-right: auto;">Locations</span>
        </div>
        <a class="btn btn-sm btn-outline-success" class="m-0 float-right" href="{{route('locations.create')}}">
            <span class="mdi mdi-plus"> Create</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable-buttons" class="table table-hover">
                <thead class="bg-success text-white text-center">
                   <tr class="tableHeader">
                     <th>SL</th>
                     <th>Division</th>
                     <th>District</th>
                     <th>Area</th>
                     <th>Postal Code</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 @isset($locations)
                    @foreach ($locations as $location)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $location->division ?? null }}</td>
                            <td>{{ $location->district ?? null }}</td>
                            <td>{{ $location->area ?? null }}</td>
                            <td>{{ $location->postal_code ?? null }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('locations.show', $location->id) }}" class="btn btn-sm btn-outline-info mr-1"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-sm btn-outline-primary mr-1"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('locations.destroy', $location->id) }}" method="post">@csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></button>
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

</div>
@endsection
