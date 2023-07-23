@extends('backend.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="text-center">
            <span class="m-0 text-info" style="font-size: 30px; margin-right: auto;">Blood Banks</span>
        </div>
        <a class="btn btn-sm btn-outline-success" class="float-right" href="{{route('blood-banks.create')}}">
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
                     <th>Donar Name</th>
                     <th>Donar Number</th>
                     <th>Blood Group</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                @isset($bloodBanks)
                    @foreach ($bloodBanks as $bloodBank)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                @if(isset($bloodBank->location->division))
                                    {{ isset($bloodBank->location) ? ($bloodBank->location->division.', '.$bloodBank->location->district.', '.$bloodBank->location->area) : null }}
                                @else                                          
                                    {{ isset($bloodBank->location) ? ($bloodBank->location->district.', '.$bloodBank->location->area) : null }}
                                @endif                            </td>
                            <td>{{ $bloodBank->person_name }}</td>
                            <td>{{ $bloodBank->phone_number }}</td>
                            <td class="text-center">{{ $bloodBank->blood_group }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('blood-banks.show', $bloodBank->id) }}" class="btn btn-sm btn-outline-info mr-1"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('blood-banks.edit', $bloodBank->id) }}" class="btn btn-sm btn-outline-primary mr-1"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('blood-banks.destroy', $bloodBank->id) }}" method="post">@csrf @method('DELETE')
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
