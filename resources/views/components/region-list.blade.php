<div class="container mt-4">
    <div class="row">
        @foreach ($regions as $region)
            <div class="col-md-4 mb-3">
                <div class="d-flex align-items-center">
                    <a href="{{ route('regions.show', $region->slug) }}" class="btn btn-primary me-2">
                        <img src="{{ asset('storage/' . $region->button_flag) }}" alt="{{ $region->name }}" width="30">
                    </a>
                    <a href="{{ route('regions.show', $region->slug) }}" class="text-decoration-none">
                        <h3 class="mb-0">{{ $region->name }}</h3>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

