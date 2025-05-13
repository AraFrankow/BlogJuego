<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>
<x-layout>
    <x-slot:title>Publicar un Post</x-slot:title>
    <h1 class="mb-3">Publicar un Post</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            La información ingresada contiene errores. Por favor, revisá los campos y probá de nuevo.
        </div>
    @endif
    <form action="{{ route('blog.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                class="form-control @error('title') is-invalid @enderror"
                @error('title') aria-invalid="true" aria-errormessage="error-title" @enderror
                value="{{ old('title') }}"
            >
            @error('title')
                <div class="text-danger" id="error-title">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Imagen sobre el juego</label>
            <input type="file" id="cover" name="cover" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cover_description" class="form-label">
                Descripcion sobre la imagen <span class="small">(Opcional)</span>
            </label>
            <input type="text" id="cover_description" name="cover_description" class="form-control">
        </div>
        <div class="mb-3">
            <label for="excerpt" class="form-label">Introducción al post</label>
            <input 
                type="text" 
                id="excerpt" 
                name="excerpt" 
                class="form-control @error('excerpt') is-invalid @enderror"
                @error('excerpt') aria-invalid="true" aria-errormessage="error-excerpt" @enderror
                value="{{ old('excerpt') }}"
            >
             @error('excerpt')
                <div class="text-danger" id="error-excerpt">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Cuerpo del Post</label>
            <textarea 
                name="body" 
                id="body" 
                class="form-control"
            >{{ old('body') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="published_at" class="form-label">Publicado</label>
            <input 
                type="date" 
                id="published_at" 
                name="published_at" 
                class="form-control @error('published_at') is-invalid @enderror"
                @error('published_at') aria-invalid="true" aria-errormessage="error-published_at" @enderror
                value="{{ old('published_at') }}"
            >
            @error('published_at')
                <div class="text-danger" id="error-published_at">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</x-layout>