<?php
/** @var \App\Models\Blog $blog */
?>
<x-layout>
    <x-slot:title>Detalle del Post {{ $blog->title }}</x-slot:title>
    <h1 class="mb-3">Confirmación para eliminar {{ $blog->title }}</h1>

    <p class="mb-1">¿Está seguro de que desea <b>eliminar</b> el blog <b>{{ $blog->title }}</b> ?</p>

    <form 
        action="{{ route('blog.destroy', ['id' => $blog->blog_id]) }}" 
        method="post"
        class="mb3"
    >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    <hr class="mb-3">

    <h2 class="mb-3">{{ $blog->title }}</h2>
    <d1>
        <dt>Fecha de Publicación</dt>
        <dd>{{ $blog->published_at }}</dd>
    </d1>
    <hr class="mb-3">
    <h2 class="mb-3">Actualización acerca del juego</h2>
    <div>{{ $blog->body }}</div>
</x-layout>