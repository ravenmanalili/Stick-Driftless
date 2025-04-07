<!DOCTYPE html>
<html class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Stick-Driftless</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    @yield('styles')
</head>
<body class="overflow-x-hidden dark:bg-gray-950 dark:text-gray-100">
    @include('layouts.header')
    
    @yield('content')
    
    @include('layouts.footer')
    
    @yield('scripts')

    <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Toggle burger menu
    window.toggleBurgerMenu = function () {
      var dropDown = document.getElementById("burgerMenu");
      dropDown.classList.toggle("max-xl:hidden");
    };

    window.closeDropDown = function () {
      var dropDown = document.getElementById("burgerMenu");
      dropDown.classList.toggle("max-xl:hidden");
    };

    window.toggleConnectContent = function () {
      var socials = document.getElementById("socials");
      socials.classList.toggle("max-xl:hidden");
    };

    window.toggleResourcesContent = function () {
      var resources = document.getElementById("resources");
      resources.classList.toggle("max-xl:hidden");
    };

    window.toggleAboutContent = function () {
      var about = document.getElementById("about");
      about.classList.toggle("max-xl:hidden");
    };

    // Carousel logic
    let index = 0;
    const slides = document.querySelectorAll("#carousel img");
    const dots = document.querySelectorAll("#dots span");
    const totalSlides = slides.length;

    let timeoutId;

    function showSlide(i) {
      document.getElementById("carousel").style.transform = `translateX(-${i * 100}%)`;
      dots.forEach(dot => dot.classList.remove("bg-gray-800", "dark:bg-blue-900"));
      dots[i].classList.add("bg-gray-800", "dark:bg-blue-900");
    }

    function autoSlide() {
      index = (index + 1) % totalSlides;
      showSlide(index);
      timeoutId = setTimeout(autoSlide, 4000);
    }

    timeoutId = setTimeout(autoSlide, 4000);
    showSlide(index);
  });
</script>

</body>

</html>

