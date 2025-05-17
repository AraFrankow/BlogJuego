<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Blog $blog */
?>
<x-layout>
    <x-slot:title>Editar Post {{ $blog->title }}</x-slot:title>
    <h1 class="mb-3">Editar {{ $blog->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            La información ingresada contiene errores. Por favor, revisá los campos y probá de nuevo.
        </div>
    @endif
    <form 
        action="{{ route('blog.update', ['id' => $blog->blog_id]) }}" 
        method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input 
            type="text" 
                id="title" 
                name="title" 
                class="form-control @error('title') is-invalid @enderror"
                @error('title') aria-invalid="true" aria-errormessage="error-title" @enderror
                value="{{ old('title', $blog->title) }}"
                
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
            <input 
            type="text" 
                id="cover_description" 
                name="cover_description" 
                class="form-control @error('cover_description') is-invalid @enderror"
                @error('cover_description') aria-invalid="true" aria-errormessage="error-cover_description" @enderror
                value="{{ old('cover_description', $blog->cover_description) }}"
            >
        </div>
        <div class="mb-3">
            <label for="excerpt" class="form-label">Introducción al post</label>
            <input 
            type="text" 
                id="excerpt" 
                name="excerpt" 
                class="form-control @error('excerpt') is-invalid @enderror"
                @error('excerpt') aria-invalid="true" aria-errormessage="error-excerpt" @enderror
                value="{{ old('excerpt', $blog->excerpt) }}"
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
            >{{ old('body', $blog->body) }}</textarea>
            @error('body')
                <div class="text-danger" id="error-body">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="published_at" class="form-label">Publicado</label>
            <input 
            type="date" 
                id="published_at" 
                name="published_at" 
                class="form-control @error('published_at') is-invalid @enderror"
                @error('published_at') aria-invalid="true" aria-errormessage="error-cover_description" @enderror
                value="{{ old('published_at', $blog->published_at) }}"
            >
            @error('published_at')
                <div class="text-danger" id="error-published_at">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Aplicar cambios</button>
    </form>
</x-layout>