<x-layout>
    <x-slot:title>Listado de Noticias</x-slot:title>
    <h1 class="mb-3">Listado de Blogs</h1>
    @auth
    <p class="mb-3"> <a href="{{ route('blog.create') }}">Publicar un Post</a> </p>
    @endauth

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Resumen</th>
                <th>Publicado</th>
                <th>Acciones</th>
            </tr>
            <?php
            foreach($blogs as $blog):
            ?>
           <tr>
                <td>{{ $blog->blog_id }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->excerpt }}</td>
                <td>{{ $blog->published_at }}</td>
                <td class="align-top">
                    <div class="d-flex gap-1">
                        <a href="{{ route('blog.view', ['id' => $blog->blog_id]) }}"
                        class="btn btn-primary"
                        >Ver</a>
                        @auth
                        <a href="{{ route('blog.edit', ['id' => $blog->blog_id]) }}"
                        class="btn btn-secondary"
                        >Editar</a>
                        <a href="{{ route('blog.delete', ['id' => $blog->blog_id]) }}"
                        class="btn btn-danger"
                        >Eliminar</a>
                        @endauth
                    </div>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </thead>
    </table>
</x-layout>