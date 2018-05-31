@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::model($item, ['route' => ['employees.update',$item->id], 'method' => 'PUT']) !!}
        @include('elements.employees.form')
    {!! Form::close() !!}
</div>
@endsection
