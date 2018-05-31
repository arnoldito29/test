@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::model($item, ['route' => ['companies.update',$item->id], 'method' => 'PUT', 'files' => true]) !!}
        @include('elements.companies.form')
    {!! Form::close() !!}
</div>
@endsection
