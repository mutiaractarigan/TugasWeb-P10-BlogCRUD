@extends('layouts.app')

@section('title', 'Tulis Post')

@section('content')
    <x-card title="Tulis Post Baru">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            @include('posts._form')

            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </x-card>
@endsection
