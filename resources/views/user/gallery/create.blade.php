@extends('user.layouts.index')
@section('content')
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload foto</label>
            <input name="foto"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                id="file_input" type="file" required>
        </div>
        <div class="mb-6">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Title post</label>
            <input required name="title" type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Describe about this foto</label>
            <textarea required name="deskripsi" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
        </div>
        <button id="button-rgb" class="rounded-full py-2 px-4 text-white font-semibold">Add</button>
    </form>

    @push('style')
        <style>
            #button-rgb {
                background: yellow;
                animation: rgb-color 1s ease-in-out infinite;
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