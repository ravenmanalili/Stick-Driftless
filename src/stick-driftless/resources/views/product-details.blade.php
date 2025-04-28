@extends('layouts.app')

@section('content')

<section id="productDetails" class="flex flex-row items-center justify-center pt-20 max-md:flex-col max-md:gap-y-8">
  <div class="flex flex-col h-full">
    <img src="{{ asset('assets/images/' . $gamepad->gamepad_image) }}" class="w-full">
    <div class="flex flex-row">
    </div>
  </div>

  <div class="flex flex-col gap-y-12 text-start max-md:px-6">
    <h1 class="text-6xl font-bold">{{ $gamepad->gamepad_name }}</h1>
    <h2 class="text-5xl font-semibold">${{ number_format($gamepad->price, 2) }}</h2>
    <p class="max-w-lg text-xl">{{ $gamepad->gamepad_description ?? 'The custom ' . $gamepad->platform . ' controller designed to help you react faster & win more. Over 8 Hours of Active Gameplay. Pairs Well With Shooter, Action and Adventure Games.' }}</p>
    <div class="flex flex-row gap-x-4 max-sm:flex-col max-sm:gap-y-4">
        <button type="" class="flex justify-center p-3 text-2xl font-extrabold text-gray-100 transition duration-500 transform rounded-lg cursor-pointer h-fit w-52 bg-gradient-to-r from-blue-700 to-blue-500 hover:scale-110 dark:bg-gradient-to-r dark:from-blue-950 dark:to-blue-900 max-sm:w-64">Order Now</button>
        <button type="" class="flex justify-center p-3 text-2xl font-extrabold text-gray-100 transition duration-500 transform rounded-lg cursor-pointer h-fit w-52 bg-gradient-to-r from-blue-700 to-blue-500 hover:scale-110 dark:bg-gradient-to-r dark:from-blue-950 dark:to-blue-900 max-sm:w-64">Add to Cart</button>
    </div>
  </div>
</section>

@endsection