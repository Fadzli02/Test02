@extends('user.layouts.index')

@section('content')
    <div class="space-y-5 grid grid-cols-1 place-items-center w-full">
        @foreach ($foto as $f)
            <a href="/detail/{{ $f->id_foto }}" class="max-w-md">
                <img src="{{ asset('storage/' . $f->path_foto) }}" alt="{{ $f->judul_foto }}"
                    class="h-[500px] w-[500px] object-cover">
                <div>
                    <b>{{ $f->user->username }}</b> | {{ $f->judul_foto }}
                </div>
            </a>
        @endforeach
    </div>
@endsection
