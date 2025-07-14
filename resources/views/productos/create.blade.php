<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>
<x-layout>
    <x-slot:title>Crear Productos</x-slot:title>
    <section class="formulario-seccion">
        <div class="formulario-container">
            <h1>Crear Nuevo Producto</h1>
            
            @if($errors->any())
                    <div class="form-error">
                        La información ingresada contiene errores. Por favor, revisá los campos y probá de nuevo.
                    </div>
                @endif
            <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data"> 
                @csrf
                <label for="nombre">Nombre</label>
                <input 
                    type="text" 
                    id="nombre" 
                    name="nombre" 
                    value="{{ old('nombre') }}" 
                    class="@error('nombre') invalid @enderror"
                    @error('nombre') aria-invalid="true" aria-errormessage="error-nombre" @enderror
                >
                @error('nombre')
                    <p class="input-error" id="error-nombre">{{ $message }}</p>
                @enderror

                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="6">{{ old('descripcion') }}</textarea>

                <label for="fecha_lanzamiento">Fecha de lanzamiento</label>
                <input 
                    type="date" 
                    id="fecha_lanzamiento" 
                    name="fecha_lanzamiento" 
                    value="{{ old('fecha_lanzamiento') }}" 
                    class="@error('fecha_lanzamiento') invalid @enderror"
                    @error('nofecha_lanzamientombre') aria-invalid="true" aria-errormessage="error-fecha_lanzamiento" @enderror
                >
                @error('fecha_lanzamiento')
                    <p class="input-error" id="error-fecha_lanzamiento">{{ $message }}</p>
                @enderror

                <label for="estado">Estado</label>
                <input 
                    type="text" 
                    id="estado" 
                    name="estado" 
                    value="{{ old('estado') }}" 
                    class="@error('estado') invalid @enderror"
                    @error('estado') aria-invalid="true" aria-errormessage="error-estado" @enderror
                >
                @error('estado')
                    <p class="input-error" id="error-estado">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn-principal">Publicar</button>
            </form>
        </div>
    </section>
</x-layout>