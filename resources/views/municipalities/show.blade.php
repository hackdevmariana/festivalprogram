@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $municipality->name }}</h1>
        <p><strong>Provincia:</strong> {{ $municipality->province->name }}</p>
        <p><strong>Coordenadas:</strong> {{ $municipality->latitude }}, {{ $municipality->longitude }}</p>
    </div>
@endsection
