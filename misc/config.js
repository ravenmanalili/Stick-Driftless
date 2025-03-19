// function toggleBurgerMenu() {
//     var dropDown = document.getElementById("burgerMenu");
//     if (dropDown.style.display === "block") {
//       dropDown.classList.toggle("max-xl:hidden");
//     } else {
//       dropDown.classList.toggle("max-xl:hidden")
//     }
//   }

//   function closeDropDown() {
//     var dropDown = document.getElementById("burgerMenu");
//     dropDown.classList.toggle("max-xl:hidden")
//   }

//   function toggleConnectContent() {
//     var socials = document.getElementById("socials");
//     if (socials.style.display === "flex") {
//       socials.classList.toggle("max-xl:hidden")
//     } else {
//       socials.classList.toggle("max-xl:hidden")
//     }
//   }

//   function toggleResourcesContent() {
//     var resources = document.getElementById("resources");
//     if (resources.style.display === "flex") {
//       resources.classList.toggle("max-xl:hidden")
//     } else {
//       resources.classList.toggle("max-xl:hidden")
//     }
//   }

//   function toggleAboutContent() {
//     var about = document.getElementById("about");
//     if (about.style.display === "flex") {
//       about.classList.toggle("max-xl:hidden")
//     } else {
//       about.classList.toggle("max-xl:hidden")
//     }
//   }

//   let index = 0;
//   const slides = document.querySelectorAll("#carousel img");
//   const dots = document.querySelectorAll("#dots span");
//   const totalSlides = slides.length;

//   let timeoutId;

//   function showSlide(i) {
//       document.getElementById("carousel").style.transform = `translateX(-${i * 100}%)`;
//       dots.forEach(dot => dot.classList.remove("bg-gray-800", "dark:bg-blue-900"));
//       dots[i].classList.add("bg-gray-800", "dark:bg-blue-900");
//   }

//   function goToSlide(i) {
//       index = i;
//       showSlide(index);
      
//       // Reset the timer
//       clearTimeout(timeoutId);
//       timeoutId = setTimeout(autoSlide, 4000);
//   }

//   function autoSlide() {
//       index = (index + 1) % totalSlides;
//       showSlide(index);
      
//       timeoutId = setTimeout(autoSlide, 4000);
//   }

//   // Start the first auto-slide
//   timeoutId = setTimeout(autoSlide, 4000);
//   showSlide(index);

