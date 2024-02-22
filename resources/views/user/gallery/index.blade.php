@extends('user.layouts.index')

@section('content')
    <h1>{{ $user->fullname }} || {{ $user->username }}</h1>
    <p>{{ $user->email }}</p>
    <p>{{ $user->alamat }}</p>
    <a href="/newImage"
        class="bg-gray-700 rounded-full text-white grid place-items-center fixed w-14 h-14 bottom-10 right-10 text-3xl">
        <p class="mb-1">+</p>
    </a>
    <div class="grid grid-cols-4 gap-2">
        @foreach ($foto as $f)
            <a href="/edit/{{ $f->id_foto }}/{{ $f->user->username }}">
                <img src="{{ asset('storage/' . $f->path_foto) }}" alt="{{ $f->judul_foto }}" class="h-full object-cover">
            </a>
        @endforeach
    </div>
@endsection
