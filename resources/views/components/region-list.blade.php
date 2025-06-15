<div class="container mt-4">
    <div class="row">
        @foreach ($regions as $region)
            <div class="col-md-4 text-center mb-3">
                <a href="{{ route('regions.show', $region->slug) }}" class="text-decoration-none">
                    <h3>{{ $region->name }}</h3>
                </a>
                <a href="{{ route('regions.show', $region->slug) }}" class="btn btn-primary">
                    <img src="{{ asset('images/' . $region->button_flag) }}" alt="{{ $region->name }}" width="30">
                </a>
            </div>
        @endforeach
    </div>
</div>
