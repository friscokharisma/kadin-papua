@extends('layouts.app')

@section('content')
<div class="w-8/12 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Article posts
        </h1>
    </div>
</div>

{{-- @if (session()->has('message'))
    <div class="w-8/12 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif --}}

{{-- @if (Auth::check())
    <div class="pt-15 w-8/12 m-auto">
        <a 
            href="/article/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Buat Artikel
        </a>
    </div>
@endif --}}

@foreach ($posts as $post)

    <div class="sm:grid grid-cols-2 gap-20 w-8/12 mx-auto py-15 border-b border-gray-200">
        <div>
            <img class="h-96 object-center object-cover" src="{{ asset('images/' . $post->image_path) }}" width="700" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $post->title }}
            </h2>
            
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>
            </span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ Str::words($post->description, 50) }} 
                {{-- comment up | Buat Kutilpan (excerpt) --}}
                {{-- comment | {{ $post->description }} --}}
            </p>
            
            <a href="/article/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-md font-extrabold py-4 px-8 rounded-xl">
                Lanjut Baca
            </a>

            {{-- comment | @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a 
                        href="/article/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>
                
                <span class="float-right">
                    <form 
                        action="/article/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button class="text-red-500 pr-3" type="submit">
                            Delete
                        </button>
                    </form>
                </span>
            @endif --}}
        </div>
    </div>

@endforeach

<div class="flex sm:w-8/12 w-11/12 items-center justify-center py-10 mx-auto">
    <div class="sm:grid grid-cols-3 gap-10">

        @foreach ($posts as $post)

            <div class="bg-gray-100 px-4 py-4 rounded-lg shadow-md">
                <div class="rounded-lg overflow-hidden text-center">
                    <img class="h-52 w-full object-cover object-center" src="{{ asset('images/' . $post->image_path) }}" alt="">
                </div>
                <div class="pt-4">
                    <a href="/article/{{ $post->slug }}" class="text-xl font-bold">{{ $post->title }}</a>

                    <div class="pt-2">
                        <span class="text-gray-500">
                            {{ date('jS M Y', strtotime($post->updated_at)) }} | 
                            <span class="text-gray-500">{{ $post->user->name }}</span>
                        </span>
                    </div>

                    <p class="py-4">{{ Str::words($post->description, 50) }}</p>
                </div>
            </div>

        @endforeach

    </div>
</div>


{{-- <div class="sm:grid grid-cols-2 gap-20 w-8/12 mx-auto py-15 border-b border-gray-200">
    <div>
        <img class="rounded-lg" src="https://koreri.com/wp-content/uploads/2021/05/Ronald-Antonio-Bonay-Kadin-Papua.jpg" width="700" alt="">
    </div>

    <div>
        <h2 class="text-gray-700 font-bold text-5xl pb-4">
            Ronald Antonio Bonay, Ketua Umum Kadin Papua yang Baru
        </h2>
        
        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">Admin</span>
        </span>, 1 day ago
        
        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos reprehenderit nemo dolor eum perspiciatis beatae. Quas, minus corporis. Reiciendis velit mollitia quaerat repudiandae nulla debitis accusamus corrupti tempora accusantium dolor.
        </p>
        
        <a href="" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Lanjut Baca
        </a>
    </div>
</div> --}}

@endsection