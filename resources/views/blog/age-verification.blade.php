<?php
/** @var \App\Models\Blog $blog  */
?>
<x-layout>
    <x-slot:title>Verificación de Edad</x-slot:title>

    <section class="formulario-seccion">
        <div class="formulario-container">
            <h1 class="mb-4">Confirmación de Edad</h1>

            <p>
                El post <b>{{ $blog->title }}</b> está marcado como <b>solo para mayores de 16 años</b> por tener el tag de <b>Demo</b>.
            </p>
            <p>
                Para continuar, necesitás confirmar que cumplís con este requerimiento.
            </p>

            <form method="POST" action="{{ route('blog.age-verification.save', ['id' => $blog->blog_id]) }}">
                @csrf

                <div class="botones-verificacion">
                    <button type="submit" class="btn-principal me-3">Sí, soy mayor de edad</button>
                    <a href="{{ route('blog.index') }}" class="btn-secundario">No, soy menor de edad</a>
                </div>
            </form>
        </div>
    </section>
</x-layout>
