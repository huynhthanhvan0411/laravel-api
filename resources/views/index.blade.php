@extends('page')

@section('content')
    <h1>hi</h1>
    <table>
        @php
            $count = 0;
        @endphp
        @foreach ($product as $item)
            <tr>{{ $count++ }}</tr>
            <tr>{{ $item->name }}</tr>
            <tr>{{ $item->description }}</tr>
            <tr>{{ $item->price }}</tr>
        @endforeach
    </table>
@endsection
