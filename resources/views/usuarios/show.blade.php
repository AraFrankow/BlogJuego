<x-layout>
    <x-slot:title>Perfil de {{ $user->name }}</x-slot:title>
    <section class="contacto">
        <div class="container">
            <h2>Perfil de {{ $user->name }}</h2>

            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Registrado desde:</strong> {{ $user->created_at->format('d/m/Y') }}</p>

            <a href="{{ route('auth.change') }}" class="btn btnVerd">Cambiar contraseña</a>
        </div>
    </section>
</x-layout>

