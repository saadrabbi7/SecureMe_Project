@extends('backend.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="text-center">
            <span class="m-0 text-info" style="font-size: 30px;text-align: center; margin-right: auto;">Police Stations</span>
        </div>
        <a class="btn btn-sm btn-outline-success" class="m-0 float-right" href="{{route('police-stations.create')}}">
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
                     <th>Name</th>
                     <th>Number</th>
                     <th>Tel Number</th>
                     <th>Description</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                @isset($policeStations)
                    @foreach ($policeStations as $policeStation)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                @if(isset($policeStation->location->division))
                                    {{ isset($policeStation->location) ? ($policeStation->location->division.', '.$policeStation->location->district.', '.$policeStation->location->area) : null }}
                                @else                                          
                                    {{ isset($policeStation->location) ? ($policeStation->location->district.', '.$policeStation->location->area) : null }}
                                @endif                              </td>
                            <td>{{ $policeStation->name }}</td>
                            <td>
                                @isset($policeStation->station_number)
                                    @foreach (json_decode($policeStation->station_number) as $number)                                    
                                        {{ $number }}, 
                                    @endforeach
                                @endisset
                            </td>
                            <td>{{ $policeStation->station_tel }}</td>
                            <td>{{ $policeStation->description }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('police-stations.show', $policeStation->id) }}" class="btn btn-sm btn-outline-info mr-1"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('police-stations.edit', $policeStation->id) }}" class="btn btn-sm btn-outline-primary mr-1"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('police-stations.destroy', $policeStation->id) }}" method="post">@csrf @method('DELETE')
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
