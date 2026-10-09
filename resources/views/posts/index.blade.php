@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <h1>Daftar Post</h1>

    <form method="GET" action="{{ route('posts.index') }}" class="search">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul atau penulis...">
        <button type="submit" class="btn">Cari</button>
        @if ($search)
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Reset</a>
        @endif
    </form>

    @forelse ($posts as $post)
        <x-card :title="$post->title">
            <p class="meta">Oleh {{ $post->author }} &middot; {{ $post->created_at->format('d M Y') }}</p>
            <p>{{ Str::limit($post->content, 150) }}</p>

            <div class="actions">
                <a href="{{ route('posts.show', $post) }}" class="btn btn-small">Baca</a>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-small btn-secondary">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus post ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-small btn-danger">Hapus</button>
                </form>
            </div>
        </x-card>
    @empty
        <x-alert type="info">Belum ada post{{ $search ? ' yang cocok dengan pencarian.' : '.' }}</x-alert>
    @endforelse

    {{ $posts->links('pagination::bootstrap-4') }}
@endsection
