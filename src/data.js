const products = [
    { name: "Scuf Reflex Pro", price: "$49.99", image: "images/scuf-reflex-pro.png" },
    { name: "Razer Wolverine", price: "$79.99", image: "images/razer-wolverine-v2-pro.png" },
    { name: "Victrix Pro BFG", price: "$69.99", image: "images/victrix-pro-bfg.png" },
    { name: "Scuf Envision Pro", price: "$89.99", image:"images/envision.png"},
    { name: "PS4 Nagashock Gaming", price: "$30.99", image: "images/nagashock.png" },
    { name: "Zombie Core Xbox Elite", price: "$153.99", image: "images/zombie-face.png" },
    { name: "Gold Fade Xbox Series X/S", price: "$119.95", image: "images/gold-fade-xbox.png" },
    { name: "Xbox 360 Spartan Controller", price: "$174.99", image:"images/spartan-controller.png"}
];

document.getElementById("product-container").innerHTML = products.map(product => `
    <div class="flex flex-col items-center justify-center">
        <a href="#" class="flex h-96 transform items-center justify-center rounded-lg border border-black transition duration-500 hover:scale-110 dark:border-gray-100">
            <img src="${product.image}" class="w-sm max-xl:w-xs m-1 h-fit">
        </a>
        <p class="max-w-sm cursor-pointer pt-6 text-2xl font-semibold">${product.name}</p>
        <p class="cursor-pointer text-2xl">${product.price}</p>
    </div>
`).join("");