@extends('user.layouts.index')

@section('content')
    <h1 class="text-4xl font-semibold">New Albums</h1>


    <form class="max-w-sm" action="/albums/new" method="post">
        @csrf
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
        <select id="countries" name="photos"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a Photo</option>
            @foreach ($foto as $f)
                <option value="{{ $f->id_foto }}">{{ $f->judul_foto }}</option>
            @endforeach
        </select>
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title Album</label>
            <input type="text" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Describe about this albums</label>
            <textarea required name="deskripsi" id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here..."></textarea>
        </div>
    </form>
@endsection
