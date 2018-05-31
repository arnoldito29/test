{{ csrf_field() }}
<div class="form-group @if($errors->get('first_name')) error @endif">
    {!! Form::label('first_name','Vardas',['class' => 'control-label'])!!}
    {!! Form::text('first_name',old('first_name'),['form-control'])!!}
</div>
<div class="form-group @if($errors->get('last_name')) error @endif">
    {!! Form::label('last_name','pavarde',['class' => 'control-label'])!!}
    {!! Form::text('last_name',old('last_name'),['form-control'])!!}
</div>
<div class="form-group @if($errors->get('email')) error @endif">
    {!! Form::label('email','pastas',['class' => 'control-label'])!!}
    {!! Form::text('email',old('email'),['form-control'])!!}
</div>
<div class="form-group @if($errors->get('phone')) error @endif">
    {!! Form::label('phone','tel nr',['class' => 'control-label'])!!}
    {!! Form::text('phone',old('phone'),['form-control'])!!}
</div>
<div class="form-group @if($errors->get('company')) error @endif">
    {!! Form::label('company','kompanija',['class' => 'control-label'])!!}
    {!! Form::select('company_id',$companies, old('company'),['form-control'])!!}
</div>
<div class="form-group">
    <input type="submit" value="Patvirtinti">
</div>    
   