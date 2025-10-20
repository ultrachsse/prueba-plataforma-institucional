<x-app-layout>
    <div class="container">
        <h1 class="h3 mb-4">➕ Registrar nuevo docente</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('docentes.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <small class="text-danger">⚠️ {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">⚠️ {{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">RUT</label>
                            <input type="text" name="rut" class="form-control" value="{{ old('rut') }}" required>
                            @error('rut')
                                <small class="text-danger">⚠️ {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                            @error('telefono')
                                <small class="text-danger">⚠️ {{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Asignatura</label>
                        <select name="asignatura_id" class="form-select" required>
                            <option value="">-- Seleccione una asignatura --</option>
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->id }}" {{ old('asignatura_id') == $asignatura->id ? 'selected' : '' }}>
                                    {{ $asignatura->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('asignatura_id')
                            <small class="text-danger">⚠️ {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <small class="text-danger">⚠️ {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('docentes.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
