@extends('user.layouts.index')

@section('content')
<div class="grid grid-cols-4 place-items-center gap-2">
    <div>
        <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->judul_foto }}" class="h-full object-cover">
    </div>
</div>
<form action="/edit/{{ $foto->id_foto }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-6">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Title post</label>
        <input value="{{ $foto->judul_foto }}" required name="title" type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-6">
        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Describe about this foto</label>
        <textarea required name="deskripsi" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $foto->deskripsi_foto }}</textarea>
    </div>
    <button id="button-rgb" class="rounded-full py-2 px-4 text-white font-semibold">Edit</button>
</form>
<form action="/delete/{{ $foto->id_foto }}" method="post" class="mt-5">
    @csrf
    @method('delete')
    <button id="button-rgb1" onclick="confirm('Seriusly delete this file?')" class="rounded-full py-2 px-4 text-white font-semibold">Delete</button>
</form>
@push('style')
    <style>
        #button-rgb {
            background: yellow;
            animation: rgb-color 1s ease-in-out infinite;
        }

        #button-rgb1 {
            background: yellow;
            animation: rgb-color 2s ease-in-out infinite;
        }

        @keyframes rgb-color {
            0% {
                background: red;
            }

            50% {
                background: green;
            }

            100% {
                background: blue;
            }
        }
    </style>
@endpush
@endsection