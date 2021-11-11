@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>
                {{-- Carousel --}}
                <div class="mx-auto sm:w-8/12 w-11/12 carousel relative shadow-2xl bg-white mt-4">
                    <div class="carousel-inner relative overflow-hidden">
                        <!--Slide 1-->
                        <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                        <div class="carousel-item absolute opacity-0" style="height:50vh; ">
                            {{-- <img class="d-block h-full w-full object-center object-cover" src="https://koreri.com/wp-content/uploads/2021/05/Ronald-Antonio-Bonay-Kadin-Papua.jpg" alt="First slide"> --}}

                            {{-- <div class="p-10 min-h-screen flex items-center justify-center bg-teal-400">
                                <div class="w-full max-w-lg h-64 rounded-lg shadow-2xl overflow-hidden relative"> --}}
                                    <img class="absolute inset-0 h-full w-full object-center object-cover" src="https://koreri.com/wp-content/uploads/2021/05/Ronald-Antonio-Bonay-Kadin-Papua.jpg" alt="First slide">
                                    <div class="flex h-full items-center justify-center relative">
                                        <h1 class="sm:text-3xl sm:mt-64 mt-44 text-lg text-gray-100 tracking-wider bg-opacity-50 bg-gray-900 bg w-full py-4 text-center font-medium">Ronald Antonio Bonay, Ketua Umum Kadin Papua yang Baru</h1>
                                    </div>
                                {{-- </div>
                            </div> --}}
                        </div>
                        <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 sm:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 sm:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
                        
                        <!--Slide 2-->
                        <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                        <div class="carousel-item absolute opacity-0" style="height:50vh;">
                            <img class="d-block h-full w-full object-center object-cover" src="https://www.beritapapua.co/wp-content/uploads/2021/05/IMG20210521225808_resize_7.jpg" alt="Second slide">
                        </div>
                        <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 sm:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 sm:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label> 
                        
                        <!--Slide 3-->
                        <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                        <div class="carousel-item absolute opacity-0" style="height:50vh;">
                            <img class="d-block h-full w-full object-center object-cover" src="https://kabarpapua.co/wp-content/uploads/2018/03/Ketua-Kadin-Papua-Adolof-Alpius-Asmuruf-KabarPapua.co-Syahriah.jpg" alt="Third slide">
                        </div>
                        <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 sm:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 sm:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
                        
                        <!-- Add additional indicators for each slide-->
                        <ol class="carousel-indicators">
                            <li class="inline-block mr-3">
                                <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                            </li>
                            <li class="inline-block mr-3">
                                <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                            </li>
                            <li class="inline-block mr-3">
                                <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                            </li>
                        </ol>
                        
                    </div>
                </div>
                {{-- Carousel --}}

                <div class="sm:grid grid-cols-5 sm:w-8/12 w-11/12 mx-auto mt-4 py-4 divide-x-2 divide-gray-800 border-b border-gray-200 bg-yellow-400">
                    <div class="flex justify-center">
                        <a href="/article" class="font-medium">Berita</a>
                    </div>
                    <div class="flex justify-center">
                        <a href="/gallery"  class="font-medium">Gallery</a>
                    </div>
                    <div class="flex justify-center">
                        <a href="/agenda"  class="font-medium">Agenda</a>
                    </div>
                    <div class="flex justify-center">
                        <a href="/membership"  class="font-medium">Membership</a>
                    </div>
                    <div class="flex justify-center">
                        <a href="/info"  class="font-medium">Info</a>
                    </div>
                </div>

                <div class="flex sm:w-8/12 w-11/12 mx-auto mt-10 object-center justify-center">
                    <h1 class="text-2xl font-bold">
                        Berita Terbaru
                    </h1>
                </div>

                {{-- <div>
                    Agenda
                </div> --}}

                <div class="sm:grid grid-cols-2 gap-20 sm:w-8/12 w-11/12 mx-auto pt-10 border-b border-gray-200">
                    <div>
                        <img class="rounded-lg" src="https://koreri.com/wp-content/uploads/2021/05/Ronald-Antonio-Bonay-Kadin-Papua.jpg" width="700" alt="">
                    </div>

                    <div class="m-auto sm:m-auto text-left w-full block">
                        <h2 class="text-3xl font-extrabold text-gray-600">
                            Ronald Antonio Bonay, Ketua Umum Kadin Papua yang Baru
                        </h2>
                        <p class="py-8 text-gray-500 text-l">
                            5 Oktober 2021
                        </p>
                        <p class="font-bold text-gray-600 text-l pb-10">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos, esse. Possimus eum reiciendis molestias dolore dicta asperiores sequi labore quos repellendus fugit a ipsa ipsum, dignissimos saepe voluptas debitis amet.
                        </p>
                        <a 
                            href="/article"
                            class="uppercase bg-blue-500 hover:bg-blue-700 text-gray-100 text-s font-extrabold py-3 px-6 rounded-xl"
                            >
                            Selengkapnya
                        </a>
                    </div>
                </div>
                
                <div class="flex sm:w-8/12 w-11/12 items-center justify-center py-10 mx-auto">
                    <div class="sm:grid grid-cols-3 gap-10">
                        {{-- <div class="bg-yellow-500 rounded-lg h-44 w-45 text-center" style="position: relative;"> --}}
                        {{-- <div class="bg-yellow-500 rounded-lg text-center" style="position: relative;">
                            <img class="h-full w-full rounded-lg object-cover object-center" src="https://kabarpapua.co/wp-content/uploads/2018/03/Ketua-Kadin-Papua-Adolof-Alpius-Asmuruf-KabarPapua.co-Syahriah.jpg" alt="">
                            <h2 class="block bg-gray-600 bg-opacity-60 w-full font-extrabold text-lg" style="position: absolute; bottom: 0; left: 0;">Test</h2>
                        </div> --}}
                        <div class="bg-gray-100 px-4 py-4 rounded-lg shadow-md">
                            <div class="rounded-lg overflow-hidden text-center">
                                <img class="h-52 w-full object-cover object-center" src="https://kabarpapua.co/wp-content/uploads/2018/03/Ketua-Kadin-Papua-Adolof-Alpius-Asmuruf-KabarPapua.co-Syahriah.jpg" alt="">
                            </div>
                            <div class="pt-4">
                                <a href="" class="text-xl font-bold">Test Desain Web Kadin Papua</a>
                                <p class="py-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ex maiores labore. Incidunt, saepe eaque.</p>
                            </div>
                            <div class="pt-2">
                                <p class="text-gray-500">5 Oktober 2021</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 px-4 py-4 rounded-lg shadow-md">
                            <div class="rounded-lg overflow-hidden text-center">
                                <img class="h-52 w-full object-cover object-center" src="https://koreri.com/wp-content/uploads/2021/05/Ronald-Antonio-Bonay-Kadin-Papua.jpg" alt="">
                            </div>
                            <div class="pt-4">
                                <a href="" class="text-xl font-bold">Test Desain Web Kadin Papua</a>
                                <p class="py-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ex maiores labore. Incidunt, saepe eaque.</p>
                            </div>
                            <div class="pt-2">
                                <p class="text-gray-500">5 Oktober 2021</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 px-4 py-4 rounded-lg shadow-md">
                            <div class="rounded-lg overflow-hidden text-center">
                                <img class="h-52 w-full object-cover object-center" src="https://www.beritapapua.co/wp-content/uploads/2021/05/IMG20210521225808_resize_7.jpg" alt="">
                            </div>
                            <div class="pt-4">
                                <a href="" class="text-xl font-bold">Test Desain Web Kadin Papua</a>
                                <p class="py-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ex maiores labore. Incidunt, saepe eaque.</p>
                            </div>
                            <div class="pt-2">
                                <p class="text-gray-500">5 Oktober 2021</p>
                            </div>
                        </div>
                        
                        <div class="bg-gray-100 px-4 py-4 rounded-lg shadow-md">
                            <div class="rounded-lg overflow-hidden text-center">
                                <img class="h-52 w-full object-cover object-center" src="https://kabarpapua.co/wp-content/uploads/2018/03/Ketua-Kadin-Papua-Adolof-Alpius-Asmuruf-KabarPapua.co-Syahriah.jpg" alt="">
                            </div>
                            <div class="pt-4">
                                <a href="" class="text-xl font-bold">Test Desain Web Kadin Papua</a>
                                <p class="py-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ex maiores labore. Incidunt, saepe eaque.</p>
                            </div>
                            <div class="pt-2">
                                <p class="text-gray-500">5 Oktober 2021</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 px-4 py-4 rounded-lg shadow-md">
                            <div class="rounded-lg overflow-hidden text-center">
                                <img class="h-52 w-full object-cover object-center" src="https://koreri.com/wp-content/uploads/2021/05/Ronald-Antonio-Bonay-Kadin-Papua.jpg" alt="">
                            </div>
                            <div class="pt-4">
                                <a href="" class="text-xl font-bold">Test Desain Web Kadin Papua</a>
                                <p class="py-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ex maiores labore. Incidunt, saepe eaque.</p>
                            </div>
                            <div class="pt-2">
                                <p class="text-gray-500">5 Oktober 2021</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 px-4 py-4 rounded-lg shadow-md">
                            <div class="rounded-lg overflow-hidden text-center">
                                <img class="h-52 w-full object-cover object-center" src="https://www.beritapapua.co/wp-content/uploads/2021/05/IMG20210521225808_resize_7.jpg" alt="">
                            </div>
                            <div class="pt-4">
                                <a href="" class="text-xl font-bold">Test Desain Web Kadin Papua</a>
                                <p class="py-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit ex maiores labore. Incidunt, saepe eaque.</p>
                            </div>
                            <div class="pt-2">
                                <p class="text-gray-500">5 Oktober 2021</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex sm:w-8/12 w-11/12 items-center justify-center mx-auto">
                    <a 
                        href="/article"
                        class="uppercase bg-blue-500 hover:bg-blue-700 text-gray-100 text-s font-extrabold py-3 px-6 rounded-xl"
                        >
                        Berita Lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection