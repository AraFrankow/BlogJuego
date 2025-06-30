<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Producto $producto */
?>
<x-layout>
    <x-slot:title>Editar Producto</x-slot:title>
    <section class="formulario-seccion">
        <div class="formulario-container">
            <h1>Editar "{{ $producto->nombre }}"</h1>
            @if ($errors->any())
                <div class="form-error">
                    La información ingresada contiene errores. Por favor, revisá los campos y probá de nuevo.
                </div>
            @endif
            <form 
                action="{{ route('productos.update', $producto) }}" 
                method="post"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input 
                        type="text" 
                        id="nombre" 
                        name="nombre" 
                        class="form-control @error('nombre') is-invalid @enderror"
                        @error('nombre') aria-invalid="true" aria-errormessage="error-nombre" @enderror
                        value="{{ old('nombre', $producto->nombre) }}"
                    >
                    @error('nombre')
                        <p class="input-error" id="error-nombre">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea 
                        name="descripcion" 
                        id="descripcion" 
                        class="form-control @error('descripcion') is-invalid @enderror"
                        @error('precio') aria-invalid="true" aria-errormessage="error-precio" @enderror
                    >{{ old('descripcion', $producto->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="input-error" id="error-descripcion">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input 
                        type="number" 
                        id="precio" 
                        name="precio" 
                        class="form-control @error('precio') is-invalid @enderror"
                        @error('precio') aria-invalid="true" aria-errormessage="error-precio" @enderror
                        value="{{ old('precio', $producto->precio) }}"
                    >
                    @error('precio')
                        <p class="input-error" id="error-precio">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-principal">Aplicar cambios</button>
            </form>
        </div>
    </section>
</x-layout>
