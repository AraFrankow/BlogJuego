<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Blog $blog */
/** @var \Illuminate\Support\Collection<int, \App\Models\Tags> $tags */
$tagIds = $blog->tags->pluck('tag_id')->all();
?>
<x-layout>
    <x-slot:title>Editar Post {{ $blog->title }}</x-slot:title>
    <section class="formulario-seccion">
        <div class="formulario-container">
            <h1>Editar "{{ $blog->title }}"</h1>

            @if ($errors->any())
                <div class="form-error">
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
                        <p class="input-error" id="error-title">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="categoria_fk" class="form-label">Categoria</label>
                    <select name="caategoria_fk" id="categoria_fk" class="form-control">
                        @foreach ($categorias as $categoria)
                            <option 
                                value="{{ $categoria->categoria_id }}"
                                @selected($categoria->categoria_id == old('categoria_fk', $blog->categoria_fk))
                            >
                                {{ $categoria->name }} ({{ $categoria->abbreviation }})
                            </option>
                        @endforeach
                    </select>
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
                        <p class="input-error" id="error-excerpt">{{ $message }}</p>
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
                        <p class="input-error" id="error-title">{{ $message }}</p>
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
                       <p class="input-error" id="error-published_at">{{ $message }}</p>
                    @enderror
                </div>

                <fieldset class="mb-3">
                    <legend class="form-label">Tags</legend>
                    @foreach ($tags as $tag)
                        <label class="me-3">
                            <input 
                                type="checkbox" 
                                name="tag_id[]" 
                                value="{{ $tag->tag_id }}"
                                @checked(in_array($tag->tag_id, old('tag_id', $tagIds)))
                            >
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </fieldset>

                <button type="submit" class="btn-principal">Aplicar cambios</button>
            </form>
        </div>
    </section>
</x-layout>