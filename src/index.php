<?php
include 'db_connection.php';
?>

<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Stick-Driftless</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    body {
      font-family: 'Montserrat', sans-serif;
    }
  </style>
</head>
<body class="overflow-x-hidden dark:bg-gray-950 dark:text-gray-100">
  
  <?php include 'layout/header.php'; ?>
  

  <?php
  // Check if a page is set in the URL, otherwise default to 'home'
  $page = isset($_GET['page']) ? $_GET['page'] : 'home';

  // Define allowed pages and their corresponding paths
  $allowed_pages = [
      'home' => 'pages/home/home.php',
      'catalogue' => 'pages/catalogue/catalogue.php',
      'cart' => 'pages/cart/cart.php',
      'customize' => 'pages/customize/customize.php',
      'playstation' => 'pages/customize/playstation.php',
      'retro' => 'pages/customize/retro.php',
      'switch' => 'pages/customize/switch.php',
      'xbox' => 'pages/customize/xbox.php',
      'product-details' => 'pages/product-details/product-details.php',
      'results' => 'pages/results/results.php',
      'inventory' => 'pages/inventory/inventory.php',
  ];

  // Include the requested page if it's allowed, otherwise load home.php
  if (array_key_exists($page, $allowed_pages)) {
      include $allowed_pages[$page];
  } else {
      include 'pages/home/home.php'; // Default page if invalid
  }
  ?>

  <?php include 'layout/footer.php'; ?>

<script>
  function toggleBurgerMenu() {
    var dropDown = document.getElementById("burgerMenu");
    if (dropDown.style.display === "block") {
      dropDown.classList.toggle("max-xl:hidden");
    } else {
      dropDown.classList.toggle("max-xl:hidden")
    }
  }

  function closeDropDown() {
    var dropDown = document.getElementById("burgerMenu");
    dropDown.classList.toggle("max-xl:hidden")
  }

  function toggleConnectContent() {
    var socials = document.getElementById("socials");
    if (socials.style.display === "flex") {
      socials.classList.toggle("max-xl:hidden")
    } else {
      socials.classList.toggle("max-xl:hidden")
    }
  }

  function toggleResourcesContent() {
    var resources = document.getElementById("resources");
    if (resources.style.display === "flex") {
      resources.classList.toggle("max-xl:hidden")
    } else {
      resources.classList.toggle("max-xl:hidden")
    }
  }

  function toggleAboutContent() {
    var about = document.getElementById("about");
    if (about.style.display === "flex") {
      about.classList.toggle("max-xl:hidden")
    } else {
      about.classList.toggle("max-xl:hidden")
    }
  }

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

  function goToSlide(i) {
      index = i;
      showSlide(index);
      
      // Reset the timer
      clearTimeout(timeoutId);
      timeoutId = setTimeout(autoSlide, 4000);
  }

  function autoSlide() {
      index = (index + 1) % totalSlides;
      showSlide(index);
      
      timeoutId = setTimeout(autoSlide, 4000);
  }

  // Start the first auto-slide
  timeoutId = setTimeout(autoSlide, 4000);
  showSlide(index);

  
  
</script>

</body>


</html>

