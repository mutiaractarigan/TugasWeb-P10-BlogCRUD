@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <x-card title="Edit Post">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            @include('posts._form')

            <button type="submit" class="btn">Simpan Perubahan</button>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Batal</a>
        </form>
    </x-card>
@endsection
