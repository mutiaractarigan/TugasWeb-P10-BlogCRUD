{{-- Form dipakai bersama oleh create & edit --}}
<div class="form-group">
    <label for="title">Judul</label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}"
           class="@error('title') is-invalid @enderror">
    @error('title')
        <small class="error-text">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="author">Penulis</label>
    <input type="text" id="author" name="author" value="{{ old('author', $post->author ?? '') }}"
           class="@error('author') is-invalid @enderror">
    @error('author')
        <small class="error-text">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="content">Isi Post</label>
    <textarea id="content" name="content" rows="8"
              class="@error('content') is-invalid @enderror">{{ old('content', $post->content ?? '') }}</textarea>
    @error('content')
        <small class="error-text">{{ $message }}</small>
    @enderror
</div>
