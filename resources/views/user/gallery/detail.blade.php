@extends('user.layouts.index')

@section('content')
<div class="grid grid-cols-2">
    <div class="max-w-md">
        <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->judul_foto }}"
            class="h-[500px] w-[500px] object-cover">
    </div>
    <div>
        <h1 class="text-3xl font-bold">{{ $foto->judul_foto }}</h1>
        <small>{{ $foto->user->username }}</small>
        <p class="mt-5">{{ $foto->deskripsi_foto }}</p>
    </div>
</div>
@endsection
