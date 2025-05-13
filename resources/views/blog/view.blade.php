<?php
 /** @var \App\Models\Blog $blog */
?>
<x-layout> 
    <x-slot:title>Detalle del Post {{ $blog->title }}</x-slot:title>
    <h1 class="m-3">{{ $blog->title }}</h1>

    <d1>
        <dt>Fecha de Publicación</dt>
        <dd>{{ $blog->published_at }}</dd>
    </d1>
    <hr class="mb-3">
    <h2>Actualización acerca del juego</h2>
    <div>{{ $blog->body }}</div>
</x-layout>