<x-app-layout>
    <div class="container">
        <h1 class="h3 mb-4">👩‍🏫 Detalle del Docente</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">{{ $docente->user->name }}</h4>
                <p class="card-text"><strong>Email:</strong> {{ $docente->user->email }}</p>
                <p class="card-text"><strong>RUT:</strong> {{ $docente->rut }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $docente->telefono ?? 'No registrado' }}</p>
                <p class="card-text"><strong>Asignatura:</strong> {{ $docente->asignatura->nombre ?? 'Sin asignar' }}</p>
            </div>
        </div>

        <div class="mt-3 d-flex justify-content-end">
            <a href="{{ route('docentes.index') }}" class="btn btn-secondary me-2">⬅️ Volver</a>
            <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning me-2">✏️ Editar</a>
            <form action="{{ route('docentes.destroy', $docente) }}" method="POST" onsubmit="return confirm('¿Eliminar este docente?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Eliminar</button>
            </form>
        </div>
    </div>
</x-app-layout>
