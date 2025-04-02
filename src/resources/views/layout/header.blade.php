<nav id="topNavbar" class="fixed z-50 h-fit w-full bg-gradient-to-r from-blue-500 to-blue-300 dark:bg-gradient-to-r dark:from-blue-950 dark:to-blue-900">
  <section class="flex justify-between">
    <a href="index.php?page=home" class="max-md:text-md m-auto mx-6 flex cursor-pointer text-3xl font-extrabold max-sm:text-2xl xl:mx-auto">Stick-Driftless</a>
    <section id="burgerButton" class="mx-6 flex items-center xl:hidden">
      <button class="m-4 cursor-pointer text-lg font-semibold hover:text-gray-700" onClick="toggleBurgerMenu()">☰</button>
    </section>
    <section id="searchInputField" class="max-xl:hidden">
      <form action="index.php?page=results" method="GET" class="relative flex items-center max-xl:flex-col">
        <input type="text" class="w-3xl m-4 rounded-lg border border-black p-3 px-20 text-lg font-semibold dark:border-gray-300" placeholder="Looking for something?">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-12">
          <img src="https://icongr.am/entypo/magnifying-glass.svg?size=20&color=ffffff" class="hidden dark:block">
          <img src="https://icongr.am/entypo/magnifying-glass.svg?size=20&color=000000" class="block dark:hidden">
        </div>
      </form>
    </section>
    <section id="rightNav" class="mx-6 flex items-center max-xl:hidden xl:mx-auto"> 
      <a href="index.php?page=cart"  class="m-4 cursor-pointer text-lg font-semibold hover:underline">Cart</a>
      <a href="index.php?page=inventory" class="m-4 cursor-pointer text-lg font-semibold hover:underline">Inventory</a>
      <a href="forms/login.php" class="m-4 cursor-pointer text-lg font-semibold hover:underline">Sign Up</a>
    </section>
  </section>
  <section id="menu" class="mx-6 flex items-center justify-center max-xl:hidden xl:mx-auto">
    <a href="index.php?page=home" class="m-2 mx-4 mb-4 text-lg font-semibold hover:underline">Home</a>
    <a href="index.php?page=catalogue" class="m-2 mx-4 mb-4 text-lg font-semibold hover:underline">Catalogue</a>
    <a href="index.php?page=customize" class="m-2 mx-4 mb-4 text-lg font-semibold hover:underline">Customization</a>
  </section>
</nav>

<section id="searchDropdown" class="hidden pt-8">
  <div class="flex flex-col items-center justify-center pt-8">
    <input type="text" class="w-3xl m-4 mx-4 rounded-lg border border-gray-300 p-2" placeholder="Looking for something?">
    <button class="m-4 rounded-lg border border-gray-300 p-2">Search</button>
  </div>
</section>

<section id="burgerMenu" class="fixed top-14 z-50 w-screen bg-gradient-to-r from-blue-300 to-blue-100 transition-all duration-500 dark:bg-gradient-to-r dark:from-blue-950 dark:to-blue-950 max-xl:hidden xl:hidden">
  <div class="flex flex-col items-center justify-center pt-8">
    <form action="index.php?page=results" method="GET" class="relative max-xl:flex-col">
      <input type="text" class="w-2xl m-4 rounded-lg border border-black p-3 px-12 text-lg font-semibold dark:border-gray-300 max-md:w-fit max-md:text-sm" placeholder="Looking for something?">
      <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-8">
        <img src="https://icongr.am/entypo/magnifying-glass.svg?size=20&color=ffffff" class="hidden dark:block">
        <img src="https://icongr.am/entypo/magnifying-glass.svg?size=20&color=000000" class="block dark:hidden">
      </div>
    </form>
    
    <a href="index.php?page=home"  class="m-4 text-lg font-semibold hover:underline">Home</a>
    <a href="index.php?page=catalogue"  class="m-4 text-lg font-semibold hover:underline">Catalogue</a>
    <a href="index.php?page=customize" class="m-4 text-lg font-semibold hover:underline">Customization</a>
    <a href="forms/login.php" class="m-4 text-lg font-semibold hover:underline">Sign Up</a>
    <a href="index.php?page=cart"  class="m-4 text-lg font-semibold hover:underline">Cart</a>
    <a href="index.php?page=inventory"  class="m-4 text-lg font-semibold hover:underline">Inventory</a>
  </div>
</section>

