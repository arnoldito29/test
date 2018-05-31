@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['route' => 'employees.store']) !!}
        @include('elements.employees.form')
    {!! Form::close() !!}
</div>
@endsection
