<x-layout>
    <x-slot:title>Pagina Principal</x-slot:title>

    <div class="relative fondo text-white min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-30 blur-sm"></div>

    <div class="relative z-10 text-center max-w-2xl px-6">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 tracking-wide text-white">
            El último ser vivo. La última semilla.
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-8">
            Explora. Sobrevive. Restaura la vida en un planeta devastado por el tiempo y el olvido.
        </p>
        <a href="{{ route('blog.index') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full text-lg font-semibold transition">
            Leer el blog del desarrollo
        </a>
    </div>
</div>



</x-layout>