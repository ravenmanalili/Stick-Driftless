@extends('layouts.app')

@section('content')

<section id="controllerCategory" class="flex flex-col items-center justify-center pb-40 max-xl:pt-16 xl:pt-36">
  <h1 class="p-8 text-4xl font-semibold text-center">Select a Category</h1>
  <div class="grid grid-cols-4 gap-x-8 max-xl:grid-cols-2 max-xl:gap-x-4 max-md:grid-cols-1">
    <div class="flex flex-col items-center justify-center">
      <a href="{{ route('playstation') }}" class="transition duration-500 transform border border-black rounded-lg hover:scale-110 dark:border-gray-100">
        <img src="{{ asset('images/playstation.png') }}" class="h-full m-1 w-sm max-xl:w-xs">
      </a>
      <a href="{{ route('playstation') }}" class="p-6 m-4 text-2xl font-semibold cursor-pointer hover:underline">PlayStation</a>
    </div>

    <div class="flex flex-col items-center justify-center">
      <a href="{{ route('xbox') }}" class="transition duration-500 transform border border-black rounded-lg hover:scale-110 dark:border-gray-100">
        <img src="{{ asset('images/xbox.png') }}" class="h-full m-1 w-sm max-xl:w-xs">
      </a>
      <a href="{{ route('xbox') }}" class="p-6 m-4 text-2xl font-semibold cursor-pointer hover:underline">Xbox</a>
    </div>

    <div class="flex flex-col items-center justify-center">
      <a href="{{ route('switch') }}" class="transition duration-500 transform border border-black rounded-lg hover:scale-110 dark:border-gray-100">
        <img src="{{ asset('images/nintendo.png') }}" class="h-full m-1 w-sm max-xl:w-xs">
      </a>
      <a href="{{ route('switch') }}" class="p-6 m-4 text-2xl font-semibold cursor-pointer hover:underline">Switch</a>
    </div>

    <div class="flex flex-col items-center justify-center">
      <a href="{{ route('retro') }}" class="transition duration-500 transform border border-black rounded-lg hover:scale-110 dark:border-gray-100">
        <img src="{{ asset('images/classic.png') }}" class="h-full m-1 w-sm max-xl:w-xs">
      </a>
      <a href="{{ route('retro') }}" class="p-6 m-4 text-2xl font-semibold cursor-pointer hover:underline">Retro</a>
    </div>
  </div>
</section>

@endsection

