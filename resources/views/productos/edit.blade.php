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
                        @error('descripcion') aria-invalid="true" aria-errormessage="error-precio" @enderror
                    >{{ old('descripcion', $producto->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="input-error" id="error-descripcion">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fecha_lanzamiento" class="form-label">Fecha de lanzamiento</label>
                    <input 
                        type="date" 
                        id="fecha_lanzamiento" 
                        name="fecha_lanzamiento" 
                        class="form-control @error('fecha_lanzamiento') is-invalid @enderror"
                        @error('fecha_lanzamiento') aria-invalid="true" aria-errormessage="error-fecha_lanzamiento" @enderror
                        value="{{ old('fecha_lanzamiento', $producto->fecha_lanzamiento) }}"
                    >
                    @error('fecha_lanzamiento')
                        <p class="input-error" id="error-fecha_lanzamiento">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input 
                        type="text" 
                        id="estado" 
                        name="estado" 
                        class="form-control @error('estado') is-invalid @enderror"
                        @error('estado') aria-invalid="true" aria-errormessage="error-estado" @enderror
                        value="{{ old('estado', $producto->estado) }}"
                    >
                    @error('estado')
                        <p class="input-error" id="error-estado">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-principal">Aplicar cambios</button>
            </form>
        </div>
    </section>
</x-layout>
