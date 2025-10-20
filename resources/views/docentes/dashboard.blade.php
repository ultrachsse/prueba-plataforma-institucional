<x-app-layout>
    <div class="container">
        <h1 class="h3 mb-4">📒 Panel de Docente</h1>
        <p>Bienvenido, aquí podrás gestionar tus bitácoras y actividades.</p>

        <div class="list-group mt-4">
            <a href="{{ route('bitacoras.index') }}" class="list-group-item list-group-item-action">
                📝 Gestionar Bitácoras
            </a>
            <a href="{{ route('asignaturas.index') }}" class="list-group-item list-group-item-action">
                📚 Ver Asignaturas
            </a>
        </div>
    </div>
</x-app-layout>
