<?php
 /** @var \App\Models\Blog $blog */
?>
<x-layout> 
    <x-slot:title>Detalle del Post {{ $blog->title }}</x-slot:title>
    <section class="noticias">
        <div class="container">
            <h1>{{ $blog->title }}</h1>
            <div class="grid-VerNoticia">
                <div class="card-noticia">
                    <d1 class="contenido">
                        <dt>Fecha de Publicación</dt>
                        <dd>{{ $blog->published_at }}</dd>
                    </d1>
                    <hr class="mb-3">
                    <h2>Actualización acerca del juego</h2>
                    <div class="contenido">
                        {!! nl2br($blog->body) !!} <!-- Hace el salto de linea y lo imprime como html -->
                    </div>
                    @if($blog->cover && Illuminate\Support\Facades\Storage::has($blog->cover))
                        <img 
                        src="{{ Illuminate\Support\Facades\Storage::url($blog->cover) }}" 
                        alt="{{  $blog->cover_description }}"
                        class="img-fluid"
                        >
                    @else
                        <p>Sin imagen</p>
                    @endif
                </div>    
            </div>
        </div>
    </section>
</x-layout>