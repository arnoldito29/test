@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('companies.create')}}">sukurti</a>
    <div class="row justify-content-center">
      <table class="table table-striped">
         <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Logo</th>
         </tr>
         </thead>
         <tbody>
            @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->website }}</td>
                <td>
                    @if (!empty($item->logo))
                    <img src="{{ asset('storage/' . $item->logo) }}" width="100">
                    @endif
                <td>
                    <a href="{{route('companies.edit',['id' => $item->id])}}">redaguoti</a>
                    {{ Form::open(['route' => ['companies.destroy', $item->id], 'method' => 'delete']) }}
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
