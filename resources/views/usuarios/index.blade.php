<x-layout>
    <x-slot:title>Listado de Usuarios</x-slot:title>
        <section class="noticias">
            <div class="container">
            <h1>Usuarios Registrados</h1>

                <div class="grid-noticias">
                    @foreach($usuarios as $usuario)
                    <article class="card-noticia">
                        <div class="contenido">
                            <p>Nombre: {{ $usuario->name }}</p>
                            <p>Email: {{ $usuario->email }}</p>
                            <div class="acciones">
                                <a href="{{ route('usuarios.show', $usuario) }}" class="btn-ver">Ver</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>

            {{ $usuarios->links() }}
        </div>
    </section>
</x-layout>

