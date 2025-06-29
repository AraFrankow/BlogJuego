<x-layout>
    <x-slot:title>Listado de Noticias</x-slot:title>

    <section class="noticias">
        <div class="container">
            <h1>Noticias del Desarrollo</h1>

            <section class="mb-3">
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <div>
                        <h2>Buscador</h2>
                        <form action="{{ route('blog.index') }}" method="get">
                            <div class="d-flex gap-3">
                                <div>
                                    <label for="s-title" class="form-label">Título</label>
                                    <input type="search" name="s-title" id="s-title" class="form-control" value="{{ $serchParams['s-title'] }}">
                                </div>
                                <div>
                                    <label for="s-categoria" class="form-label">Categoría</label>
                                    <select name="s-categoria" id="s-categoria" class="form-control">
                                        <option value="">Todas</option>
                                        @foreach($categorias as $categoria)
                                            <option 
                                            value="{{ $categoria->categoria_id }}"
                                            @selected($categoria->categoria_id == $serchParams['s-categoria'])
                                            >
                                                {{ $categoria->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="align-self-end">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="mb-4 text-right">
                                <a href="{{ route('blog.create') }}" class="btn-nuevo">Publicar un Post</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </section>

            @if(!empty($serchParams['s-title']))
                <p class="mb-3 fst-italic">
                    Resultados de la búsqueda: <b>{{ $serchParams['s-title'] }}</b>
                </p>
            @endif
            
            <h2 class="visually-hidden">Posts</h2>
            @if($blogs->isNotEmpty())
            <div class="grid-noticias">
                @foreach($blogs as $blog)
                    <article class="card-noticia">
                        <div class="contenido">
                            <h2>{{ $blog->title }}</h2>
                            <p class="fecha">{{ $blog->published_at }}</p>
                            <p>{{ $blog->categoria->name }}</p>
                            <p>{{ $blog->excerpt }}</p>
                            <p>
                                @foreach($blog->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach
                            </p>
                        </div>
                        <div class="acciones">
                            <a href="{{ route('blog.view', ['id' => $blog->blog_id]) }}" class="btn-ver">Ver</a>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('blog.edit', ['id' => $blog->blog_id]) }}" class="btn-editar">Editar</a>
                                    <a href="{{ route('blog.delete', ['id' => $blog->blog_id]) }}" class="btn-eliminar">Eliminar</a>
                                @endif
                            @endauth
                        </div>
                    </article>
                @endforeach
            </div>
            {{ $blogs->links() }}
            @else
                <p class="alert alert-info">No hay posts que coincidan con la búsqueda.</p>
            @endif
        </div>
    </section>
</x-layout>
