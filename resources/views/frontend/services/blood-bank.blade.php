@extends('frontend-master')
@section('content')
    <section id="blog" class="blog mt-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
            <p>Blood Bank Info</p>
            </header>
            <div class="row">

                <div class="col-lg-3">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Division</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                @isset($categories)
                                    @foreach ($categories as $division => $category)
                                        <li><a href="{{ url('services/blood-banks/'.trim(strtolower($division), ' ')) }}" class="d-flex justify-content-between">
                                            {{ ucwords($division) }} 
                                            <span class="text-primary">
                                                @isset($category)
                                                    @php
                                                        $digit = 0;
                                                    @endphp
                                                    @foreach ($category as $item)
                                                        @isset($item)
                                                            @php
                                                                $digit += count($item->bloodBanks)
                                                            @endphp
                                                        @endisset
                                                    @endforeach
                                                    {{ $digit }}
                                                @endisset
                                            </span>
                                        </a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div><!-- End sidebar categories-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

                <div class="col-lg-9 entries">
                    <article class="entry entry-single">
                        <form action="{{ url('/services/blood-bank') }}" method="GET">
                            <div class="row mb-3">
                                <div class="form-group col-sm-9">
                                    <select class="form-control my-2" name="blood_group" id="blood_group"
                                    placeholder="Choose Location">
                                    <option value=""> -- Choose Blood Group -- </option>
                                    @isset($bloodGroups)
                                        @foreach ($bloodGroups as $bloodGroup)
                                            <option value="{{ $bloodGroup }}" {{ isset($selectedLocation) ? ($selectedLocation == $location->id ? "selected" : "") : "" }}>
                                                {{ $bloodGroup }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="bi bi-search"></i>
                                        Search
                                    </button>
                                    <a href="{{ url('/services/blood-bank') }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-x-lg"></i> Reset
                                    </a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                <tr align="center" class="table-primary">
                                    <th>#SL</th>
                                    <th>Location</th>
                                    <th>Donar Name</th>
                                    <th>Donar Number</th>
                                    <th>Blood group</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($bloodBanks)
                                    @forelse ($bloodBanks as $bloodBank)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                @if(isset($bloodBank->location->division))
                                                    {{ isset($bloodBank->location) ? ($bloodBank->location->division.', '.$bloodBank->location->district.', '.$bloodBank->location->area) : null }}
                                                @else                                          
                                                    {{ isset($bloodBank->location) ? ($bloodBank->location->district.', '.$bloodBank->location->area) : null }}
                                                @endif
                                            </td>
                                            <td>{{ $bloodBank->person_name ?? null }}</td>
                                            <td>{{ $bloodBank->phone_number ?? null }}</td>
                                            <td>{{ $bloodBank->blood_group ?? null }}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" align="center">No Records Found</td>
                                    </tr>
                                    @endforelse
                                @endisset
                            </tbody>
                        </table>

                    </article>

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section>
    @push('js')
        <script type=text/javascript>
            $(document).ready(function() {
                $('#blood_group').select2();
            });
            $('#division').change(function() {
                var division = $(this).val();
                if (division) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/services/get-district') }}?division=" + division,
                        success: function(res) {
                            if (res) {
                                $("#district").empty();
                                $("#district").append('<option>-- Select District --</option>');
                                $.each(res, function(key, value) {
                                    $("#district").append('<option value="' + value + '">' + value +
                                        '</option>');
                                });

                            } else {
                                $("#district").empty();
                            }
                        }
                    });
                } else {
                    $("#district").empty();
                    $("#area").empty();
                }
            });
            $('#district').on('change', function() {
                var district = $(this).val();
                if (district) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/services/get-area') }}?district=" + district,
                        success: function(res) {
                            if (res) {
                                $("#area").empty();
                                $.each(res, function(key, value) {
                                    $("#area").append('<option value="' + value + '">' + value +
                                        '</option>');
                                });

                            } else {
                                $("#area").empty();
                            }
                        }
                    });
                } else {
                    $("#area").empty();
                }

            });
        </script>
    @endpush
@endsection
