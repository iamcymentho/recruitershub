@extends('layouts.app')


@section('content')
@include('partials._search')

<a href="/" class=" btn btn-dark shadow inline-block hover:bg-laravel text-light ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left text-light "></i> Back
            </a>

<div class="mx-4">
                <x-card>
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-64 mr-6 mb-6"
                            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/corrected.png') }}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">

                            {{ $listing->title }}
                        </h3>
                        <div class="text-xl font-bold mb-4">
                            {{ $listing->company}}
                        </div>
                        
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot text-teal-700"></i> {{ $listing->location }}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{$listing->description}}
                                </p>
                                

                                <a
                                    href="mailto:{{ $listing->email }}"
                                    class="block bg-teal-700 text-white mt-6 py-2 rounded-xl hover:bg-laravel"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href="{{ $listing->website }}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:bg-laravel"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card>


                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/listings/{{ $listing->listing_id}}/edit">
                    <i class="fa fa-solid fa-pencil"></i> Edit
                    </a>

                </x-card>
            </div>
@endsection