@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Add User</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post" accept-charset="utf-8">
                        @csrf

                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            {!! Form::label('nameInput', 'Name') !!}
                            {!! Form::text('name', null, [
                            'class'=>'form-control',
                            'id'=>'nameInput',
                            'required'
                            ]); !!}
                        </div>
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            {!! Form::label('emailInput', 'Email') !!}
                            {!! Form::email('email', null, [
                            'class'=>'form-control',
                            'id'=>'emailInput',
                            'required'
                            ]); !!}
                        </div>
                        @error('phone')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            {!! Form::label('phoneInput', 'Phone') !!}
                            {!! Form::text('phone', null, [
                            'class'=>'form-control',
                            'id'=>'phoneInput',
                            'required'
                            ]); !!}
                        </div>
                        @error('role_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            {!! Form::label('roleInput', 'Role'); !!}
                            {!! Form::select('role_id', $roles, null,[
                            'class'=>'form-control',
                            'id'=>'roleInput',
                            'placeholder'=>'Select Role',
                            'required',
                            ]) !!}
                        </div>
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('passwordInput', 'Password', ['class'=>' col-form-label']); !!}
                                    {!! Form::password('password', [
                                    'class'=>'form-control',
                                    'id'=>'passwordInput',
                                    'placeholder'=>'Password',
                                    ]); !!}
                                </div>
                            </div>
                            @error('password_confirmation')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('password-confirm', 'Confirm Password', ['class'=>'
                                    col-form-label']);
                                    !!}
                                    {!! Form::password('password_confirmation', [
                                    'class'=>'form-control',
                                    'id'=>'password-confirm',
                                    'placeholder'=>'Password',
                                    ]); !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success float-right">Create</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

