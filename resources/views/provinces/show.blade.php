@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $province->name }}</h1>

        <div class="row">
            @foreach($province->municipalities->chunk(ceil($province->municipalities->count() / 3)) as $chunk)
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        @foreach($chunk as $municipality)
                            <li>
                                <a href="{{ route('municipalities.show', $municipality->id) }}">
                                    {{ $municipality->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection
