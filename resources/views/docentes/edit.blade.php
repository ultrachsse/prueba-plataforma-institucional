<x-app-layout>
    <div class="container">
        <h1 class="h3 mb-4">✏️ Editar Docente</h1>

        <form action="{{ route('docentes.update', $docente) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"
                       value="{{ old('nombre', $docente->user->name) }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email', $docente->user->email) }}">
            </div>

            <div class="mb-3">
                <label>RUT</label>
                <input type="text" name="rut" class="form-control"
                       value="{{ old('rut', $docente->rut) }}">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control"
                       value="{{ old('telefono', $docente->telefono) }}">
            </div>

            <div class="mb-3">
                <label>Asignatura</label>
                <select name="asignatura_id" class="form-control">
                    @foreach($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}"
                            {{ $docente->asignatura_id == $asignatura->id ? 'selected' : '' }}>
                            {{ $asignatura->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nueva Contraseña (opcional)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">💾 Guardar cambios</button>
            <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>
