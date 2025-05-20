<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

<x-layout>
    <x-slot:title>Iniciar sesión</x-slot:title>

    <section class="formulario-seccion">
        <div class="formulario-container">
            <h1>Ingresar a tu Cuenta</h1>
            
            @if($errors->any())
                <div class="form-error">
                    La información ingresada contiene errores. Por favor, revisá los campos y probá de nuevo.
                </div>
            @endif

            <form action="{{ route('auth.authenticate') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="text" 
                        name="email" 
                        id="email" 
                        class="form-control @error('email') is-invalid @enderror"
                        @error('email') aria-invalid="true" aria-errormessage="error-email" @enderror
                        value="{{ old('email') }}" 
                    >
                    @error('email')
                        <p class="input-error" id="error-email">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
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
                <button type="submit" class="btn-principal">Iniciar Sesión</button>
            </form>
        </div>
    </section>
</x-layout>