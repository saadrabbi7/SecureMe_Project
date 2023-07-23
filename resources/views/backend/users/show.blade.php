@extends('layouts.master')

@section('title', 'Show Risk Status')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title text-uppercase">Risk Status Details  <a href="{{ route('risk_status.index') }}" class="btn btn-sm btn-info">List</a></h4>
            <hr>
            <table class="table table-striped">
                <tr>
                    <th>Name:</th>
                    <td>{{ $riskStatus->name  }}
                </tr>
                <tr>
                    <th>Color:</th>
                    <td><div style="height: 30px; width: 50px; background: {{ $riskStatus->color }}" ></div></td>
                </tr>
                <tr>
                    <th>Instructions:</th>
                    <td>{!! $riskStatus->instructions !!}</td>
                </tr>
            </table>
        </div>
    </div>$
</div>
@endsection
