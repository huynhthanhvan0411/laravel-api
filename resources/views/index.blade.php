@extends('page')

@section('content')
    <h1>hi</h1>
    <table>
        @php
            $count = 0;
        @endphp
        @foreach ($product as $item)
            <div class="hide">
                <p>{{ $count++ }}</p>
                <p>{{ $item->name }}</p>
                <p>{{ $item->description }}</p>
                <p>{{ $item->price }}</p>
            </div>
        @endforeach
        <br>
        <button type="button" class="btn">Hide</button>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.btn').click(function() {
                $('.hide').hide(); // Ẩn tất cả các div có class 'hide'
            });
        });
    </script>
@endsection
