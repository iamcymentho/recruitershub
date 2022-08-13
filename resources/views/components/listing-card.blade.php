{{-- bringing in props into the component --}}
@props(['listing'])


<!-- Item 1 -->
               <x-card>
                    <div class="flex">

                        {{-- finding the path of images and setting its default to the company logo 'corrected.png' in images folder if no image is found/uploaded --}}
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/corrected.png') }}"
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listings/{{ $listing->listing_id }}">{{ $listing->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4 mt-3">{{ $listing->company }}</div>
                           
                            <x-listings-tag :tagsCsv="$listing->tags"/>

                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot text-teal-700"></i> {{$listing->location}}
                            </div>
                        </div>
                    </div>
                

                </x-card>


