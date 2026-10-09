@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <x-card :title="$post->title">
        <p class="meta">
            Oleh {{ $post->author }} &middot; {{ $post->created_at->format('d M Y, H:i') }}
            @if ($post->updated_at->ne($post->created_at))
                &middot; diperbarui {{ $post->updated_at->diffForHumans() }}
            @endif
        </p>

        <div class="content">{!! nl2br(e($post->content)) !!}</div>

        <div class="actions">
            <a href="{{ route('posts.index') }}" class="btn btn-small btn-secondary">&larr; Kembali</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-small">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus post ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-small btn-danger">Hapus</button>
            </form>
        </div>
    </x-card>
@endsection
