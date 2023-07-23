
<div class="form-group">
  {!! Form::label('nameInput', 'Name') !!}
  {!! Form::text('name', null, [
  'class'=>'form-control',
  'id'=>'nameInput',
  'required'
  ]); !!}
</div>

<div class="form-group">
  {!! Form::label('emailInput', 'Email') !!}
  {!! Form::email('email', null, [
  'class'=>'form-control',
  'id'=>'emailInput',
  'required'
  ]); !!}
</div>

<div class="form-group">
  {!! Form::label('phoneInput', 'Phone') !!}
  {!! Form::text('phone', null, [
  'class'=>'form-control',
  'id'=>'phoneInput',
  'required'
  ]); !!}
</div>

<div class="form-group">
  {!! Form::label('roleInput', 'Role'); !!}
  {!! Form::select('role_id', $roles, null,[
  'class'=>'form-control',
  'id'=>'roleInput',
  'placeholder'=>'Select Role',
  'required',
  ]) !!}

</div>
  </div>
</div>
