{{ csrf_field() }}
<div class="form-group @if($errors->get('name')) error @endif">
    {!! Form::label('name','pavadinimas',['class' => 'control-label'])!!}
    {!! Form::text('name',old('name'),['form-control'])!!}
</div>
<div class="form-group @if($errors->get('email')) error @endif">
    {!! Form::label('email','pastas',['class' => 'control-label'])!!}
    {!! Form::text('email',old('email'),['form-control'])!!}
</div>
<div class="form-group @if($errors->get('website')) error @endif">
    {!! Form::label('website','website',['class' => 'control-label'])!!}
    {!! Form::text('website',old('website'),['form-control'])!!}
</div>
<div class="form-group @if($errors->get('logo')) error @endif">
    @if($errors->get('logo'))
    @foreach($errors->get('logo') as $key)
    {{$key}}<br />
    @endforeach
    @endif
    {!! Form::label('logo','Failas',['class' => 'control-label'])!!}
    {!! Form::file('logo')!!}
</div>
<div class="form-group">
    <input type="submit" value="Patvirtinti">
</div>    
   