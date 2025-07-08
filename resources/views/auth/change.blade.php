<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

<x-layout>
    <x-slot:title>Cambiar Contraseña</x-slot:title>

    <section class="formulario-seccion">
        <div class="formulario-container">
            <h1>Cambiar Contraseña</h1>
            
            @if($errors->any())
                <div class="form-error">
                    Por favor corregí los errores e intentá de nuevo.
                </div>
            @endif

            <form action="{{ route('auth.updatePassword') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="current_password" class="form-label">Contraseña Actual</label>
                    <input 
                        type="password" 
                        name="current_password" 
                        id="current_password" 
                        class="form-control @error('current_password') is-invalid @enderror"
                        @error('current_password') aria-invalid="true" aria-errormessage="error-current_password" @enderror
                    >
                    @error('current_password')
                        <p class="input-error" id="error-current_password">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Nueva Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control @error('password') is-invalid @enderror"
                        @error('password') aria-invalid="true" aria-errormessage="error-password" @enderror
                    >
                    @error('password')
                        <p class="input-error" id="error-password">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="form-control"
                    >
                </div>

                <button type="submit" class="btn-principal">Actualizar Contraseña</button>
            </form>
        </div>
    </section>
</x-layout>
