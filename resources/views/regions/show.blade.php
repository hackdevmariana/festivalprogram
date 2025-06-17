@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $region->name }}</h2>

        <div class="row">
            @foreach ($region->provinces as $province)
                <div class="col-md-4 mb-3">
                    <div class="province-card p-3 border rounded">
                        <h4 class="province-name" data-target="municipalities-{{ $province->id }}">{{ $province->name }}</h4>

                        <div id="municipalities-{{ $province->id }}" class="municipality-list mt-2" style="display: none;">
                            <div class="row">
                                @foreach ($province->municipalities as $municipality)
                                    <div class="col-12 col-md-4 col-xl-2 mb-2">
                                        <div class="bg-light p-2 border rounded text-center shadow-sm hover-shadow">
                                            {{ $municipality->name }}
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
