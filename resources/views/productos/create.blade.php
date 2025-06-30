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

                <label for="precio">Precio</label>
                <input 
                    type="number" 
                    id="precio" 
                    name="precio" 
                    value="{{ old('precio') }}" 
                    class="@error('precio') invalid @enderror"
                    @error('precio') aria-invalid="true" aria-errormessage="error-precio" @enderror
                >
                @error('precio')
                    <p class="input-error" id="error-precio">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn-principal">Publicar</button>
            </form>
        </div>
    </section>
</x-layout>