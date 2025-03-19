<nav id="topNavbar" class="fixed z-50 w-full h-fit bg-gradient-to-r from-blue-500 to-blue-300 dark:bg-gradient-to-r dark:from-blue-950 dark:to-blue-900">
  <section class="flex justify-between">
    <a href="index.php?page=home" class="flex m-auto mx-6 text-3xl font-extrabold cursor-pointer max-md:text-md max-sm:text-2xl xl:mx-auto">Stick-Driftless</a>
    <section id="burgerButton" class="flex items-center mx-6 xl:hidden">
      <button class="m-4 text-lg font-semibold cursor-pointer hover:text-gray-700" onClick="toggleBurgerMenu()">☰</button>
    </section>
    <section id="searchInputField" class="max-xl:hidden">
      <form action="index.php?page=results" method="GET" class="relative flex items-center max-xl:flex-col">
        <input type="text" class="p-3 px-20 m-4 text-lg font-semibold border border-gray-300 rounded-lg w-3xl" placeholder="Looking for something?">
        <div class="absolute inset-y-0 left-0 flex items-center px-12 pointer-events-none">
          <img src="https://icongr.am/entypo/magnifying-glass.svg?size=20&color=f3f4f6" class="dark:block">
        </div>
      </form>
    </section>
    <section id="rightNav" class="flex items-center mx-6 max-xl:hidden xl:mx-auto"> 
      <a href="index.php?page=cart"  class="m-4 text-lg font-semibold cursor-pointer hover:underline">Cart</a>
      <a href="forms/login.php" class="m-4 text-lg font-semibold cursor-pointer hover:underline">Sign Up</a>
    </section>
  </section>
  <section id="menu" class="flex items-center justify-center mx-6 max-xl:hidden xl:mx-auto">
    <a href="index.php?page=home" class="m-2 mx-4 mb-4 text-lg font-semibold hover:underline">Home</a>
    <a href="index.php?page=catalogue" class="m-2 mx-4 mb-4 text-lg font-semibold hover:underline">Catalogue</a>
    <a href="index.php?page=customize" class="m-2 mx-4 mb-4 text-lg font-semibold hover:underline">Customization</a>
  </section>
</nav>

<section id="searchDropdown" class="hidden pt-8">
  <div class="flex flex-col items-center justify-center pt-8">
    <input type="text" class="p-2 m-4 mx-4 border border-gray-300 rounded-lg w-3xl" placeholder="Looking for something?">
    <button class="p-2 m-4 border border-gray-300 rounded-lg">Search</button>
  </div>
</section>

<section id="burgerMenu" class="fixed z-50 w-screen transition-all duration-500 top-14 bg-gradient-to-r from-blue-300 to-blue-100 dark:bg-gradient-to-r dark:from-blue-950 dark:to-blue-950 max-xl:hidden xl:hidden">
  <div class="flex flex-col items-center justify-center pt-8">
    <form action="index.php?page=results" method="GET" class="relative max-xl:flex-col">
      <input type="text" class="p-3 px-12 m-4 text-lg font-semibold border border-gray-300 rounded-lg w-2xl max-md:w-fit max-md:text-sm" placeholder="Looking for something?">
      <div class="absolute inset-y-0 left-0 flex items-center px-8 pointer-events-none">
        <img src="https://icongr.am/entypo/magnifying-glass.svg?size=20&color=f3f4f6" class="dark:block">
      </div>
    </form>
    
    <a href="index.php?page=home"  class="m-4 text-lg font-semibold hover:underline">Home</a>
    <a href="index.php?page=catalogue"  class="m-4 text-lg font-semibold hover:underline">Catalogue</a>
    <a href="index.php?page=customize" class="m-4 text-lg font-semibold hover:underline">Customization</a>
    <a href="forms/login.php" class="m-4 text-lg font-semibold hover:underline">Sign Up</a>
    <a href="index.php?page=cart"  class="m-4 text-lg font-semibold hover:underline">Cart</a>
  </div>
</section>

