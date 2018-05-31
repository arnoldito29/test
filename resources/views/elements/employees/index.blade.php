@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('employees.create')}}">sukurti</a>
    <div class="row justify-content-center">
      <table class="table table-striped">
         <thead>
         <tr>
            <th>ID</th>
            <th>first name</th>
            <th>Email</th>
            <th>Company</th>
         </tr>
         </thead>
         <tbody>
            @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->companies->name }}</td>
                <td>
                    <a href="{{route('employees.edit',['id' => $item->id])}}">redaguoti</a>
                    {{ Form::open(['route' => ['employees.destroy', $item->id], 'method' => 'delete']) }}
                        <button type="submit">Delete</button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      {{ $list->links() }}
    </div>
</div>
@endsection
