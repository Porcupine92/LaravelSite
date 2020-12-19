@extends('layout.main')

@section('content')
    <h2>Address</h2>
    @foreach ($address as $addres)
        <p>{{ $addres }}</p>
    @endforeach
@endsection

