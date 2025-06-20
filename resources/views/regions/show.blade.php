@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>{{ $region->name }}</h2>

        <div class="row">
            @foreach ($region->provinces as $province)
                <div class="col-md-4 mb-3">
                    <div class="province-card p-3 border rounded d-flex align-items-center justify-content-between cursor-pointer"
                        onclick="toggleMunicipalities({{ $province->id }})">

                        {{-- Flecha hacia abajo --}}
                        <span class="me-2" onclick="event.stopPropagation(); toggleMunicipalities({{ $province->id }})"
                            style="cursor: pointer;">
                            &#x25BC; {{-- Unicode down arrow ▼ --}}
                        </span>

                        {{-- Nombre de la provincia como enlace --}}
                        <h4 class="mb-0 flex-grow-1">
                            <a href="{{ route('provinces.show', $province->slug) }}"
                                class="text-decoration-none text-primary">
                                {{ $province->name }}
                            </a>
                        </h4>
                    </div>
                </div>

                {{-- Lista desplegable de municipios --}}
                <div id="municipalities-{{ $province->id }}" class="municipality-list mb-4 w-100" style="display: none;">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach ($province->municipalities as $municipality)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-2">
                                    <a href="{{ route('municipalities.show', $municipality) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="bg-light p-2 ps-3 border rounded text-start shadow-sm hover-shadow">
                                            {{ $municipality->name }}
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('scripts')
<script>
    function toggleMunicipalities(provinceId) {
        const container = document.getElementById('municipalities-' + provinceId);
        if (container.style.display === 'none' || container.style.display === '') {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
        }
    }
</script>
@endpush
