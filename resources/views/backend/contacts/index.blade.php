@extends('backend.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="text-center">
            <span class="m-0 text-info" style="font-size: 30px; margin-right: auto;">Contact Infos</span>
        </div>
        {{-- <a class="btn btn-sm btn-outline-success" class="float-right" href="{{route('blood-banks.create')}}">
            <span class="mdi mdi-plus"> Create</span>
        </a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable-buttons" class="table table-hover">
                <thead class="bg-success text-white text-center">
                   <tr class="tableHeader">
                     <th>SL</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Message</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                @isset($data)
                    @foreach ($data as $datam)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $datam->name }}</td>
                            <td>{{ $datam->email ?? null }}</td>
                            <td class="text-center">{{ $datam->message ?? null }}</td>
                            <td class="d-flex justify-content-center">
                                <form action="{{ route('contact.delete', $datam->id) }}" method="post">@csrf
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
