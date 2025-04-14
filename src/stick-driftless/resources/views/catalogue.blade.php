@extends('layouts.app')
@section('content')

<h1 class="flex text-4xl font-semibold text-center py-7 max-xl:justify-center max-xl:pt-24 xl:justify-start xl:px-32 xl:pt-40">Featured</h1>
<section id="catalogueControllers" class="flex flex-col items-center justify-center pb-40">
  <div id="product-container" class="grid grid-cols-4 p-6 gap-x-8 gap-y-8 max-xl:grid-cols-3 max-xl:gap-x-4 max-md:grid-cols-1">
    @foreach($gamepads as $gamepad)
      <div class="flex flex-col items-center justify-center hover:underline">
        <a href="{{ url('product-details') }}" class="flex items-center justify-center transition duration-500 transform border border-black rounded-lg h-96 hover:scale-110 dark:border-gray-100">
            <img src="{{ asset('assets/images/' . $gamepad->gamepad_image) }}" class="m-1 w-sm max-xl:w-xs h-fit">
        </a>
        <a href="{{ url('product-details') }}" class="max-w-sm pt-6 font-semibold cursor-pointer 2xl:text-2xl max-2xl:text-md">
          {{ \Illuminate\Support\Str::limit($gamepad->gamepad_name, 15, '...') }}
        </a>
        <a href="{{ url('product-details') }}" class="2xl:text-2xl max-2xl:text-md">
          ${{ number_format($gamepad->price, 2) }}
        </a>
      </div>
    @endforeach
  </div>
</section>

@endsection