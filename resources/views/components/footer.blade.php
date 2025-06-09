<footer class="text-center bg-dark text-light py-3">
    <small>
        @if($copy === 'copyright')
            <i class="bi bi-c-circle"></i> <!-- Icono de Copyright -->
        @elseif($copy === 'copyleft')
        
            <i class="bi bi-c-circle" style="transform: rotate(180deg); display: inline-block;"></i>

         <!-- Icono invertido de Copyleft -->
        @endif
        {{ $copy }} {{ $currentYear }} {{ $company }} :|:
        Desarrollado con <i class="bi bi-tux" style="font-size: 1.5rem;"></i>
 por
        <a href="{{ $developedUrl }}" class="text-light fw-bold" target="_blank">
            {{ $developedBy }}
        </a>
    </small>
</footer>
