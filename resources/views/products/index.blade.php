@extends('layouts.app')

@section('content')





<section

  class="relative bg-[url(https://i.postimg.cc/5yVWWVPG/othmane0362-background-Sahara-Desert-Experience-camp-Merzouga-w-7ad33243-4776-4638-98e6-df9ef6785c58.png)] bg-cover bg-center bg-no-repeat">
  <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
  <div>
         <h1 class="text-white text-4xl" style="font-family: 'Alex Brush', cursive;">Artiana</h1>
          <h1 class="text-5xl font-light mb-4 mt-5 pt-5 text-white">Artiana Poufs</h1>
          <p class="text-black text-light text-white mt-5 pt-5">
              Explorez l'exquisité de l'artisanat marocain. Nos poufs faits à la main sont le parfait mélange de tradition et de modernité.</p>
          <div class="w-50 mt-5 mx-auto mt-5 pt-5">
            <button type="button" class="text-black bg-white hover:bg-white-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-black-700 dark:focus:ring-black-700 dark:border-black-700">Commandez Maintenant</button>   
          </div>
      </div>  
  </div>
  
</section>



@foreach ($products as $product)
<div class="flex flex-col md:flex-row">


@if ($loop->iteration % 2 == 1)
<div class="w-full md:w-1/2">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover" />
    </div>
  @endif
    <div class="w-full md:w-1/2 p-10 flex flex-col justify-center text-center">
        {{ $product->name }}
        <h1 class="text-5xl font-light mb-4">{{$product->presetPrice()}}</h1>
        <p class="text-black text-light">{{ $product->description }}</p>
        <div class="w-50 mt-5 mx-auto">
        <form method="POST" action="{{ route('checkout', ['productId' => $product->id]) }}">
            @csrf
            <button type="submit" class="text-white bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-black dark:hover:bg-black-700 dark:focus:ring-black-700 dark:border-black-700">Commandez</button>
        </form>        
      </div>
    </div>



    @if ($loop->iteration % 2 == 0)
    <div class="w-full md:w-1/2">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover" />
    </div>
    @endif
  
</div>
@endforeach



<div class="bg-gradient-to-r from-red-50 via-yellow-50 to-red-100 font-medium">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Produits</h2>
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

    @foreach ($products as $product)
      <div class="group relative">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{{ $product->name }}}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="{{ route('products.show', $product->slug) }}" >
                <span aria-hidden="true" class="absolute inset-0"></span>
                {{ $product->name }}
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">{{ $product->color }}</p>
          </div>
          <p class="text-sm font-medium text-gray-900">{{$product->presetPrice()}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

  
@endsection