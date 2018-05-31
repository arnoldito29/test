@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['route' => 'companies.store', 'files' => true]) !!}
        @include('elements.companies.form')
    {!! Form::close() !!}
</div>
@endsection
