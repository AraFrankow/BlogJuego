<x-layout>
    <x-slot:title>Listado de Noticias</x-slot:title>

    <section class="noticias">
        <div class="container">
            <h1>Noticias del Desarrollo</h1>

            @auth
                <div class="mb-4 text-right">
                    <a href="{{ route('blog.create') }}" class="btn-nuevo">Publicar un Post</a>
                </div>
            @endauth

            <div class="grid-noticias">
                @foreach($blogs as $blog)
                    <article class="card-noticia">
                        <div class="contenido">
                            <h2>{{ $blog->title }}</h2>
                            <p class="fecha">{{ $blog->published_at }}</p>
                            <p>{{ $blog->categoria->name }}</p>
                            <p>{{ $blog->excerpt }}</p>
                        </div>
                        <div class="acciones">
                            <a href="{{ route('blog.view', ['id' => $blog->blog_id]) }}" class="btn-ver">Ver</a>
                            @auth
                                <a href="{{ route('blog.edit', ['id' => $blog->blog_id]) }}" class="btn-editar">Editar</a>
                                <a href="{{ route('blog.delete', ['id' => $blog->blog_id]) }}" class="btn-eliminar">Eliminar</a>
                            @endauth
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
