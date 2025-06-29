<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

<x-layout>
    <x-slot:title>Registrarse</x-slot:title>
    <section class="formulario-seccion">
        <div class="formulario-container">
            <h1>Registrarse</h1>

            @if($errors->any())
                <div class="form-error">
                    La información ingresada contiene errores. Por favor, revisá los campos y probá de nuevo.
                </div>
            @endif

            <form action="{{ route('auth.authenticateRegister') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name') }}"
                        @error('name') aria-invalid="true" aria-errormessage="error-name" @enderror 
                    >
                    @error('name')
                        <p class="input-error" id="error-name">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="text" 
                        name="email" 
                        id="email"
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}"
                        @error('email') aria-invalid="true" aria-errormessage="error-email" @enderror 
                    >
                    @error('email')
                        <p class="input-error" id="error-email">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input 
                        type="text" 
                        name="password" 
                        id="password"
                        class="form-control @error('password') is-invalid @enderror" 
                        value="{{ old('password') }}"
                        @error('password') aria-invalid="true" aria-errormessage="error-password" @enderror 
                    >
                    @error('password')
                        <p class="input-error" id="error-password">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirmar Contraseña</label>
                    <input 
                        type="text" 
                        name="password" 
                        id="password"
                        class="form-control @error('password') is-invalid @enderror" 
                        value="{{ old('password') }}"
                        @error('password') aria-invalid="true" aria-errormessage="error-password" @enderror 
                    >
                    @error('password')
                        <p class="input-error" id="error-password">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn-principal">Registrarse</button>
            </form>
        </div>
    </section>
</x-layout>
