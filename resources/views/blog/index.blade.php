<x-layout>
    <x-slot:title>Listado de Noticias</x-slot:title>
    <h1 class="mb-3">Listado de Blogs</h1>

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
                <td> <a href="{{ route('blog.view', ['id' => $blog->blog_id]) }}" class="btn btn-primary">Ver</a> </td>
           </tr>
            <?php
            endforeach;
            ?>
        </thead>
    </table>
</x-layout>