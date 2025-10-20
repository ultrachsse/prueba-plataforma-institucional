<x-app-layout>
    <div class="container">
        <h1 class="h3 mb-4">➕ Nueva Asignatura</h1>

        <!-- Mensajes de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hubo algunos problemas con los datos ingresados.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('asignaturas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <small class="text-danger">⚠️ {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <small class="text-danger">⚠️ {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
