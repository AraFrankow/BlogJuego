<x-layout>
    <x-slot:title>Administrar Productos</x-slot:title>
    <section class="noticias">
        <div class="container">
            <h1>Listado de Productos</h1>
            <section class="mb-3">
                <div class="d-flex justify-content-between align-items-end mb-3">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="mb-4">
                                <a href="{{ route('productos.create') }}" class="btn-nuevo">Crear nuevo producto</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </section>

            @if($productos->isNotEmpty())
            <div class="grid-noticias">
                @foreach($productos as $producto)
                    <article class="card-noticia">
                        <div class="contenido">
                            <h2>{{ $producto->nombre }}</h2>
                            <p>{{ $producto->descripcion }}</p> 
                            <p>${{ $producto->precio }}</p>
                        </div>
                        <div class="acciones">
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('productos.edit', ['producto' => $producto->producto_id]) }}" class="btn-editar">Editar</a>
                                    <a href="{{ route('productos.delete', ['producto' => $producto->producto_id]) }}" class="btn-eliminar">Eliminar</a>
                                @endif
                            @endauth
                        </div>
                    </article>
                @endforeach
            </div>
            {{ $productos->links() }}
            @else
                <p class="alert alert-info">No hay posts que coincidan con la búsqueda.</p>
            @endif
        </div>
    </section>

</x-layout>
