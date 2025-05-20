<?php
/** @var \App\Models\Blog $blog */
?>
<x-layout>
    <x-slot:title>Detalle del Post {{ $blog->title }}</x-slot:title>
    <section class="noticias">
        <div class="container">
            <h1 class="mb-3">Confirmación para eliminar "{{ $blog->title }}"</h1>
            <div class="grid-VerNoticia">
                <div class="card-noticia">
                    <div class="centrado">
                        <p class="contenido">¿Está seguro de que desea <b>eliminar</b> el blog <b>"{{ $blog->title }}"</b> ?</p>
                        <form 
                            action="{{ route('blog.destroy', ['id' => $blog->blog_id]) }}" 
                            method="post"
                            class="contenido"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div> 
                    <h2 class="contenido">{{ $blog->title }}</h2>
                    <d1 class="contenido">
                        <dt>Fecha de Publicación</dt>
                        <dd>{{ $blog->published_at }}</dd>
                    </d1>
                    <hr class="mb-3">
                    <h2 class="contenido">Actualización acerca del juego</h2>
                    <div class="contenido">
                        {!! nl2br($blog->body) !!} <!-- Hace el salto de linea y lo imprime como html -->
                    </div>
                </div> 
            </div>
        </div>
    </section>
</x-layout>