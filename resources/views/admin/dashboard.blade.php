<x-app-layout>
    <div class="container">
        <h1 class="h3 mb-4">📊 Panel de Administrador</h1>
        <div class="list-group">
            <a href="{{ route('docentes.index') }}" class="list-group-item list-group-item-action">👩‍🏫 Gestionar Docentes</a>
            <a href="{{ route('asignaturas.index') }}" class="list-group-item list-group-item-action">📚 Gestionar Asignaturas</a>
        </div>
    </div>
</x-app-layout>
