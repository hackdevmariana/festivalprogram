@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>{{ $region->name }}</h2>

        <div class="row">
            @foreach ($region->provinces as $province)
                <div class="col-md-4 mb-3">
                    <div class="province-card p-3 border rounded">
                        <h4 class="province-name" data-target="municipalities-{{ $province->id }}">
                            {{ $province->name }}
                        </h4>
                    </div>
                </div>

                {{-- Bloque de municipios a pantalla completa --}}
                <div id="municipalities-{{ $province->id }}" class="municipality-list mb-4 w-100" style="display: none;">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach ($province->municipalities as $municipality)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-2">
                                    <div class="bg-light p-2 border rounded text-center shadow-sm hover-shadow">
                                        {{ $municipality->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
