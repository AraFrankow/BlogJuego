<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>
<x-layout>
    <x-slot:title>Publicar un Post</x-slot:title>

    <section class="formulario-seccion">
        <div class="formulario-container">
            <h1>Publicar un nuevo post</h1>

            @if($errors->any())
                <div class="form-error">
                    La información ingresada contiene errores. Por favor, revisá los campos y probá de nuevo.
                </div>
            @endif

            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data"> 
                @csrf

                <label for="title">Título</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title') }}" 
                    class="@error('title') invalid @enderror"
                    @error('title') aria-invalid="true" aria-errormessage="error-title" @enderror
                >
                @error('title')
                    <p class="input-error" id="error-title">{{ $message }}</p>
                @enderror

                <label for="categoria_fk">Categoria</label>
                <select name="categoria_fk" id="categoria_fk">
                    @foreach($categorias as $categoria)
                        <option 
                            value="{{ $categoria->categoria_id }}"
                            @selected($categoria->categoria_id == old('categoria_fk'))
                        >
                            {{ $categoria->name }} ({{ $categoria->abbreviation }})
                        </option>
                    @endforeach
                </select>
                
                <label for="cover">Imagen sobre el juego</label>
                <input type="file" id="cover" name="cover">

                <label for="cover_description">Descripción de la imagen <span class="small">(Opcional)</span></label>
                <input type="text" id="cover_description" name="cover_description" value="{{ old('cover_description') }}">
                
                <label for="excerpt">Introducción al post</label>
                <input 
                    type="text" 
                    id="excerpt" 
                    name="excerpt" 
                    value="{{ old('excerpt') }}"
                    class="@error('excerpt') invalid @enderror"
                    @error('excerpt') aria-invalid="true" aria-errormessage="error-excerpt" @enderror
                >
                @error('excerpt')
                    <p class="input-error" id="error-excerpt">{{ $message }}</p>
                @enderror

                <label for="body">Cuerpo del Post</label>
                <textarea name="body" id="body" rows="6">{{ old('body') }}</textarea>

                <label for="published_at">Fecha de publicación</label>
                <input 
                    type="date" 
                    id="published_at" 
                    name="published_at" 
                    value="{{ old('published_at') }}"
                    class="@error('published_at') invalid @enderror"
                    @error('published_at') aria-invalid="true" aria-errormessage="error-published_at" @enderror
                >
                @error('published_at')
                    <p class="input-error" id="error-published_at">{{ $message }}</p>
                @enderror

                <fieldset class="mb-3">
                    <legend>Tags</legend>
                    
                    @foreach($tags as $tag)
                        <label class="me-3">
                            <input type="checkbox" name="tag_id[]" value="{{ $tag->tag_id }}" @checked(in_array($tag->tag_id, old('tag_id', [])))>
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </fieldset>
                
                <button type="submit" class="btn-principal">Publicar</button>
            </form>
        </div>
    </section>
</x-layout>
