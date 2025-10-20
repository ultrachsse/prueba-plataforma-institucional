<x-app-layout>
    <div class="container">
        <h1 class="h3 mb-4">📚 Asignaturas</h1>
        <a href="{{ route('asignaturas.create') }}" class="btn btn-primary mb-3">➕ Nueva Asignatura</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asignaturas as $asignatura)
                            <tr>
                                <td>{{ $asignatura->nombre }}</td>
                                <td>{{ $asignatura->descripcion }}</td>
                                <td class="text-center">
                                    <a href="{{ route('asignaturas.edit', $asignatura) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                    <form action="{{ route('asignaturas.destroy', $asignatura) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar esta asignatura?')">🗑️ Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No hay asignaturas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="d-flex justify-content-center">
                    {{ $asignaturas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
