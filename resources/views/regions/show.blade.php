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
                        @foreach ($province->municipalities as $municipality)
                            <p>{{ $municipality->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
