@extends('backend.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="text-center">
            <span class="m-0 text-info" style="font-size: 30px;text-align: center; margin-right: auto;">Record Pictures</span>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable-buttons" class="table table-hover">
                <thead class="bg-success text-white text-center">
                   <tr class="tableHeader">
                     <th>SL</th>
                     <th>Capture Date</th>
                     <th>Picture</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 @isset($data)
                    @foreach ($data as $datam)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ isset($datam->created_at) ? date('d M Y H:m:s A', strtotime($datam->created_at)) : "" }}</td>
                            <td>
                                <img src="{{ asset('/record-pictures/'.$datam->image) }}" width="100px" height="auto">    
                            </td>
                            <td class="d-flex justify-content-center">
                                <form action="{{ route('picture-records.destroy', $datam->id) }}" method="post">@csrf @method('DELETE')
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
