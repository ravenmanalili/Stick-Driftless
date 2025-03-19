<h1 class="flex text-4xl font-semibold text-center py-7 max-xl:justify-center max-xl:pt-24 xl:justify-start xl:px-32 xl:pt-40">Featured</h1>
  <section id="catalogueControllers" class="flex flex-col items-center justify-center pb-40">
    <div id="product-container" class="grid grid-cols-4 gap-x-8 gap-y-8 max-xl:grid-cols-1 max-xl:gap-x-4 max-md:grid-cols-1"></div>
  </section>

<script>
  const products = [
    { name: "Scuf Reflex Pro", price: "$49.99", image: "../../assets/images/scuf-reflex-pro.png" },
    { name: "Razer Wolverine", price: "$79.99", image: "../../assets/images/razer-wolverine-v2-pro.png" },
    { name: "Victrix Pro BFG", price: "$69.99", image: "../../assets/images/victrix-pro-bfg.png" },
    { name: "Scuf Envision Pro", price: "$89.99", image:"../../assets/images/envision.png"},
    { name: "PS4 Nagashock Gaming", price: "$30.99", image: "../../assets/images/nagashock.png" },
    { name: "Zombie Core Xbox Elite", price: "$153.99", image: "../../assets/images/zombie-face.png" },
    { name: "Gold Fade Xbox Series X/S", price: "$119.95", image: "../../assets/images/gold-fade-xbox.png" },
    { name: "Xbox 360 Spartan Controller", price: "$174.99", image:"../../assets/images/spartan-controller.png"},
    { name: "PS4 Galaxy Controller", price: "$25.99", image:"../../assets/images/ps4-galaxy.png"},
    { name: "PS5 Wooden Controller", price: "$29.99", image:"../../assets/images/ps5-wood.png"},
    { name: "PS5 Standard Green Controller", price: "$39.99", image:"../../assets/images/ps5-green.png"},
    { name: "Xbox 360 Black Controller", price: "$29.99", image:"../../assets/images/xbox360.png"},
];

document.getElementById("product-container").innerHTML = products.map(product => `
    <div class="flex flex-col items-center justify-center">
        <a href="#" class="flex items-center justify-center transition duration-500 transform border border-black rounded-lg h-96 hover:scale-110 dark:border-gray-100">
            <img src="${product.image}" class="m-1 w-sm max-xl:w-xs h-fit">
        </a>
        <p class="max-w-sm pt-6 text-2xl font-semibold cursor-pointer">${product.name}</p>
        <p class="text-2xl cursor-pointer">${product.price}</p>
    </div>
`).join("");
</script>