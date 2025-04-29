@extends('layouts.app')
@section('content')

<section id="emptyCart" class="flex flex-col items-center justify-center min-h-dvh">
    <header class="text-6xl font-bold text-blue-800">CART</header>
    <p class="text-2xl">Your cart is currently empty.</p>
    <a href="{{ route('catalogue') }}" class="text-2xl hover:underline">Continue shopping</a>
</section>

@endsection


