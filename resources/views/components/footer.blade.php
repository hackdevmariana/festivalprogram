<footer class="bg-dark text-light py-4 border-top border-secondary mt-5">
    <div
        class="container text-center small d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
        <span>
            @if ($copy === 'copyright')
                <i class="bi bi-c-circle"></i> <!-- Icono de Copyright -->
            @else
                <i class="bi bi-c-circle" style="transform: rotate(180deg); display: inline-block;"></i>

                <!-- Icono invertido de Copyleft -->
            @endif
            {{ ucfirst($copy) }} © {{ $currentYear }} {{ $company }}
        </span>
        <span class="text-muted">|</span>
        <span>
            Desarrollado con <i class="bi bi-tux text-info" style="font-size: 1.5rem; vertical-align: middle;"></i>
            por <a href="{{ $developedUrl }}" class="text-info fw-semibold text-decoration-none" target="_blank">
                {{ $developedBy }}
            </a>
        </span>
    </div>
</footer>
