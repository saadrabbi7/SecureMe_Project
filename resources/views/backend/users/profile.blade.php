@extends('layouts.master')

@section('title', 'Add New Organization')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card-box">
                <div class="card-header">
                    <h4 class="header-title text-uppercase"> {{ Auth::user()->name }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Email Address:</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number:</th>
                            <td>01717277238</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>Not available</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary">Edit</button>
                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="card-box">
                <div class="card-header">
                    <h4 class="header-title text-uppercase"> Change Password</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Current Password</th>
                            <td>
                                {!! Form::password('password', [
                                                                   'class'=>'form-control',
                                                               ]); !!}                            </td>
                        </tr>
                        <tr>
                            <th>New Password</th>
                            <td>
                                {!! Form::password('password', [
                                            'class'=>'form-control',
                                        ]); !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Confirm New Password</th>
                            <td>
                                {!! Form::password('password', [
                                           'class'=>'form-control',
                                       ]); !!}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-success">Save Change</button>
                </div>

            </div>
        </div>
    </div>
@endsection
