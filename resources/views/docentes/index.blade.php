<x-app-layout>
    <div class="container">
        <h1 class="h3 mb-4">👩‍🏫 Lista de Docentes</h1>
        <a href="{{ route('docentes.create') }}" class="btn btn-primary mb-3">➕ Nuevo Docente</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>RUT</th>
                            <th>Asignatura</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($docentes as $docente)
                            <tr>
                                <td>{{ $docente->user->name }}</td>
                                <td>{{ $docente->user->email }}</td>
                                <td>{{ $docente->telefono }}</td>
                                <td>{{ $docente->rut }}</td>
                                <td>{{ $docente->asignatura->nombre ?? 'Sin asignar' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('docentes.show', $docente) }}" class="btn btn-info btn-sm">👁️ Ver</a>
                                    <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                    <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este docente?')">🗑️ Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No hay docentes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
