<?php
/** @var \App\Models\Producto $producto */
?>
<x-layout>
    <x-slot:title>Detalle del Producto {{ $producto->nombre }}</x-slot:title>
    <section class="noticias">
        <div class="container">
            <h1 class="mb-3">Confirmación para eliminar "{{ $producto->nombre }}"</h1>
            <div class="grid-VerNoticia">
                <div class="card-noticia">
                    <div class="centrado">
                        <p class="contenido">¿Está seguro de que desea <b>eliminar</b> el producto <b>"{{ $producto->nombre }}"</b> ?</p>
                        <form 
                            action="{{ route('productos.destroy', ['id' => $producto->id]) }}"
                            method="post"
                            class="contenido"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div> 
                </div> 
            </div>
        </div>
    </section>
</x-layout>