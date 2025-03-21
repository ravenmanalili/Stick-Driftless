<section id="welcomeFrontpage" class="flex flex-row items-center justify-center max-xl:flex-col xl:pt-16">
    <div class="flex flex-col max-xl:items-center max-xl:justify-center max-xl:pt-20 max-xl:text-center">
      <h1 class="max-w-md m-4 text-6xl font-bold max-xl:text-5xl">Find the controller that suits your playstyle</h1>
      <p class="max-w-sm m-4 text-3xl max-xl:text-2xl">Controllers that will help you win your next ranked match</p>
      <a href="#featuredControllers" class="flex justify-center p-6 m-4 text-2xl font-extrabold text-gray-100 transition duration-500 transform rounded-lg cursor-pointer w-xs h-fit bg-gradient-to-r from-blue-700 to-blue-500 hover:scale-110 dark:bg-gradient-to-r dark:from-blue-950 dark:to-blue-900 max-sm:w-64">Shop Now</a>
    </div>

    <div class="relative w-full max-w-3xl overflow-hidden">
      <div class="flex transition-transform duration-500 ease-in-out" id="carousel">
          <div class="flex-shrink-0 w-full">
              <img src="assets/images/frontpageroller1.png" class="h-full p-6 transition duration-500 transform cursor-pointer w-3xl max-xl:w-lg hover:scale-110 max-xl:mx-32 max-md:mx-0 md:mx-32 xl:mx-0">
          </div>
          <div class="flex-shrink-0 w-full">
              <img src="assets/images/frontpageroller2.png" class="h-full p-6 transition duration-500 transform cursor-pointer w-3xl max-xl:w-lg hover:scale-110 max-xl:mx-32 max-md:mx-0 md:mx-32 xl:mx-0">
          </div>
          <div class="flex-shrink-0 w-full">
              <img src="assets/images/frontpageroller3.png" class="h-full p-6 transition duration-500 transform cursor-pointer w-3xl max-xl:w-lg hover:scale-110 max-xl:mx-32 max-md:mx-0 md:mx-32 xl:mx-0">
          </div>
      </div>
      <div id="dots" class="absolute flex space-x-2 transform -translate-x-1/2 bottom-2 left-1/2">
          <span class="w-4 h-4 bg-gray-300 rounded-full cursor-pointer" onclick="goToSlide(0)"></span>
          <span class="w-4 h-4 bg-gray-300 rounded-full cursor-pointer" onclick="goToSlide(1)"></span>
          <span class="w-4 h-4 bg-gray-300 rounded-full cursor-pointer" onclick="goToSlide(2)"></span>
      </div>
    </div>
  </section>

  <section id="featuredControllers" class="flex flex-col items-center justify-center pt-36">
    <h1 class="max-w-3xl p-8 text-4xl font-semibold text-center">Aim with precision, dominate the competition</h1>
    <div class="grid grid-cols-4 gap-x-8 max-xl:grid-cols-1 max-xl:gap-x-4 max-md:grid-cols-1">
      <div class="flex flex-col max-w-sm m-4 max-md:items-center max-md:justify-center max-md:text-center max-sm:items-center max-sm:justify-center max-sm:text-center">
        <h2 class="m-4 text-3xl font-semibold">Featured</h2>
        <p class="m-4 text-xl">Our controllers are 100% legit. They are not macros nor cheating devices. However, do be cautious whether or not competitive rules allow use of our controllers during participated tournament.</p>
        <a href="index.php?page=catalogue" class="flex justify-center p-6 m-4 text-2xl font-extrabold text-gray-100 transition duration-500 transform rounded-lg cursor-pointer w-xs h-fit bg-gradient-to-r from-blue-700 to-blue-500 hover:scale-110 dark:bg-gradient-to-r dark:from-blue-950 dark:to-blue-900 max-sm:w-64">Shop all Favourites</a>
      </div>

      <div class="flex flex-col items-center justify-center">
        <a href="index.php?page=product-details" class="transition duration-500 transform border border-black rounded-lg hover:scale-110 dark:border-gray-100">
          <img src="assets/images/scuf-reflex-pro.png" class="h-full m-1 w-sm max-xl:w-xs">
        </a>
        <a href="index.php?page=product-details" class="p-6 m-4 text-2xl font-semibold cursor-pointer hover:underline">Scuf Reflex Pro</a>
      </div>

      <div class="flex flex-col items-center justify-center">
        <a href="index.php?page=product-details" class="transition duration-500 transform border border-black rounded-lg hover:scale-110 dark:border-gray-100">
          <img src="assets/images/razer-wolverine-v2-pro.png" class="h-full m-1 w-sm max-xl:w-xs">
        </a>
        <a href="index.php?page=product-details" class="p-6 m-4 text-2xl font-semibold cursor-pointer hover:underline">Razer Wolverine</a>
      </div>

      <div class="flex flex-col items-center justify-center">
        <a href="index.php?page=product-details" class="transition duration-500 transform border border-black rounded-lg hover:scale-110 dark:border-gray-100">
          <img src="assets/images/victrix-pro-bfg.png" class="h-full m-1 w-sm max-xl:w-xs">
        </a>
        <a href="index.php?page=product-details" class="p-6 m-4 text-2xl font-semibold cursor-pointer hover:underline">Victrix Pro BFG</a>
      </div>

    </div>
  </section>

  <section id="createController" class="flex flex-col items-center justify-center pt-8">
    <h1 class="max-w-3xl p-8 text-4xl font-semibold text-center">Adjust to your preferences, design your very own controller</h1>
    <div class="grid grid-cols-2 gap-x-8 max-xl:grid-cols-1 max-xl:gap-x-4 max-md:grid-cols-1">
      <div class="flex flex-col max-w-sm m-4 max-md:items-center max-md:justify-center max-md:text-center max-sm:items-center max-sm:justify-center max-sm:text-center">
        <h2 class="m-4 text-3xl font-semibold">Customization</h2>
        <p class="m-4 text-xl">Set the theme of your controller to your liking. Add additional buttons or paddles for a superb gameplay experience.</p>
      </div>
      <div class="flex flex-col items-center justify-center pb-12">
        <a href="index.php?page=customize" class="transition duration-500 transform border border-black rounded-lg hover:scale-110 dark:border-gray-100">
          <img src="https://icongr.am/entypo/game-controller.svg?size=128&color=1e00aa" class="h-full p-6 m-1 w-sm max-xl:w-xs">
        </a>
        <a href="index.php?page=customize" class="p-6 m-4 text-2xl font-semibold cursor-pointer hover:underline">Customize your controller</a>
      </div>
    </div>
  </section>


