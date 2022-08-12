{{-- creating  a component to wrap the card --}}


{{-- creating classes for components which will of course be its default and can also merge with newly specified ones --}}
<div {{ $attributes->merge(['class' =>'bg-gray-50 border border-gray-200 rounded p-6 shadow']) }}>


    {{-- making use of "SLOT" so we can open and close the card instead of a self closing like the "listing-card" component --}}

    {{ $slot }}

 </div>