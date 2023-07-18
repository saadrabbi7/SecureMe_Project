@extends('backend.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="text-center">
                <span class="m-0 text-info text-center" style="font-size: 30px; margin-right: auto;">Profile</span>

            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">@csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 mt-1">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" value="{{ $data->name ?? null }}"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 mt-1">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" value="{{ $data->email ?? null }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="picture" class="col-sm-3 mt-1">Picture</label>
                            <div class="col-sm-9">
                                <div style="height: 200px" class="text-center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div style="width:100px ; height: 100px" class="mx-auto">
                                                @if (isset($data->profile->picture) && $data->profile->picture != null)
                                                    <img id="output"
                                                        src="{{ asset('profile-images/' . $data->profile->picture) }}"
                                                        style="width: 100px; height:100px;" class="img-thumbnail rounded" />
                                                @else
                                                    <img id="output" src="{{ asset('assets/imgs/default-avatar.jpg') }}"
                                                        style="width: 100px; height:100px;" class="img-thumbnail rounded" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" btn btn-primary btn-file btn-round mt-2">
                                        <input type="file" name="picture" accept="image/*" onchange="loadFile(event)" />
                                        <i class="fas fa-upload"></i> Upload Photo
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 mt-1">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="number" name="phone" value="{{ $data->phone ?? null }}"
                                    class="form-control" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="blood_group" class="col-sm-3 mt-1">Blood Group</label>
                            <div class="col-sm-9">
                                <select name="blood_group" id="blood_group" class="form-control" required>
                                    <option value="">Select Blood Group</option>
                                    @isset($bloodGroups)
                                        @foreach ($bloodGroups as $bloodGroup)
                                            <option value="{{ $bloodGroup }}"
                                                {{ $data->blood_group == $bloodGroup ? 'selected' : '' }}>
                                                {{ $bloodGroup }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 mt-1">Father Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="f_name" id="f_name" value="{{ $data->profile->f_name ?? null }}"
                                    class="form-control" placeholder="Father Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="m_name" class="col-sm-3 mt-1">Mother Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="m_name" value="{{ $data->profile->m_name ?? null }}"
                                    class="form-control" placeholder="Mother Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="f_mobile_no" class="col-sm-3 mt-1">Father Phone No</label>
                            <div class="col-sm-9">
                                <input type="number" name="f_mobile_no" value="{{ $data->profile->f_mobile_no ?? null }}"
                                    class="form-control" placeholder="Father Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="m_mobile_no" class="col-sm-3 mt-1">Mother Phone No</label>
                            <div class="col-sm-9">
                                <input type="number" name="m_mobile_no" value="{{ $data->profile->m_mobile_no ?? null }}"
                                    class="form-control" placeholder="Mother Phone Number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="location_id" class="col-sm-3 mt-1">Address</label>
                            <div class="col-sm-9">
                                <select name="location_id" class="form-control select2" required>
                                    <option value="">Choose Location</option>
                                    @isset($location)
                                        @foreach ($location as $item)
                                            @if (isset($data->profile->location_id))
                                                <option value="{{ $item->id }}"
                                                    {{ $data->profile->location_id == $item->id ? 'selected' : '' }}>
                                                    @if(isset($item->division))
                                                        {{ isset($item) ? ($item->division.', '.$item->district.', '.$item->area) : null }}
                                                    @else                                          
                                                        {{ isset($item) ? ($item->district.', '.$item->area) : null }}
                                                    @endif
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">
                                                    @if(isset($item->division))
                                                        {{ isset($item) ? ($item->division.', '.$item->district.', '.$item->area) : null }}
                                                    @else                                          
                                                        {{ isset($item) ? ($item->district.', '.$item->area) : null }}
                                                    @endif
                                                </option>
                                            @endif
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="police_station" class="col-sm-3 mt-1">Police Station</label>
                            <div class="col-sm-9">
                                <input type="number" name="police_station_id" value="{{ $data->profile->police_station_id ?? null }}"
                                    class="form-control" placeholder="Police Station Phone Number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mt-2">
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
                        @isset($recordPictures)
                            @foreach ($recordPictures as $datam)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ isset($datam->created_at) ? date('d M Y H:m:s A', strtotime($datam->created_at)) : '' }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('/record-pictures/' . $datam->image) }}" width="100px"
                                            height="auto">
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <form action="{{ route('picture-records.destroy', $datam->id) }}" method="post">@csrf
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
    
    @push('js')
        <script>
            var loadFile = function(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('output');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };
        </script>
    @endpush
@endsection
