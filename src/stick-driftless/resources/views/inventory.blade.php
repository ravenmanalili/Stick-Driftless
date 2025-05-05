@extends('layouts.app')

@section('content')
<section id="inventory" class="flex flex-col gap-4 pt-40 mx-auto max-xl:pt-20 min-h-dvh xl:px-40">
    <header id="inventoryHeader" class="flex flex-row justify-between">
        <div class="text-3xl font-semibold">Inventory Management</div>
        <div id="inventorySearchInputField" class="-m-4 max-xl:hidden">
            <form action="{{ route('results') }}" method="GET" class="relative flex items-center max-xl:flex-col">
                <input type="text" name="search" class="p-3 px-20 m-4 font-semibold border border-gray-300 rounded-lg w-lg text-md" placeholder="Search Inventory">
                <div class="absolute inset-y-0 left-0 flex items-center px-12 pointer-events-none">
                <img src="https://icongr.am/entypo/magnifying-glass.svg?size=20&color=f3f4f6" class="dark:block">
                </div>
            </form>
        </div>
    </header>

    <div id="inventoryCategory" class="flex justify-between">
        <div class="flex flex-row gap-4 text-xl">
            <div class="cursor-pointer">All</div>
            <div class="cursor-pointer">PlayStation</div>
            <div class="cursor-pointer">Xbox</div>
            <div class="cursor-pointer">Nintendo</div>
            <div class="cursor-pointer">Retro</div>
        </div>
        
        <div>Filter</div>
    </div>

    <div id="inventoryCatalogue">
        <div class="grid grid-cols-4 pb-8 gap-x-8 gap-y-8 max-xl:grid-cols-3 max-xl:gap-x-4 max-md:grid-cols-1">
            @foreach($gamepads as $gamepad)
            <div class="flex flex-col items-center justify-center">
                <div class="relative flex flex-col items-center justify-center p-2 border border-black rounded-lg 2xl:h-[500px] xl:h-[376px] max-xl:h-[376px] 2xl:w-96 dark:border-gray-100">
                    <button class="cursor-pointer openInventoryModal min-h-12 max-h-12" 
                            data-gamepad-id="{{ $gamepad->gamepad_id }}"
                            data-gamepad-name="{{ $gamepad->gamepad_name }}"
                            data-gamepad-platform="{{ $gamepad->platform }}"
                            data-gamepad-price="{{ $gamepad->price }}"
                            data-gamepad-description="{{ $gamepad->gamepad_description }}">
                        <img src="https://icongr.am/entypo/edit.svg?size=20&color=000000" class="absolute block w-8 h-8 right-4 top-4 dark:hidden">
                        <img src="https://icongr.am/entypo/edit.svg?size=20&color=ffffff" class="absolute hidden w-8 h-8 right-4 top-4 dark:block">
                    </button>
                    <div class="2xl:min-h-80 2xl:max-h-80 max-2xl:min-h-52 max-2xl:max-h-52">
                        <img src="{{ asset('assets/images/' . $gamepad->gamepad_image) }}" class="m-1 w-sm max-xl:w-xs h-fit">
                    </div>
                    <p class="max-w-sm pt-6 text-2xl font-semibold">
                        {{ $gamepad->gamepad_name }}
                    </p>
                    <p class="text-2xl">
                        ${{ $gamepad->price }}
                    </p>
                </div>
            </div>
            @endforeach
            <div class="flex flex-col items-center justify-center">
                <div class="relative flex flex-col items-center justify-center p-2 border border-black rounded-lg 2xl:h-[500px] xl:h-[376px] max-xl:h-[376px] 2xl:w-96 dark:border-gray-100">
                    <div class="2xl:min-h-80 2xl:max-h-80 max-2xl:min-h-52 max-2xl:max-h-96">
                        <button id="addToInventoryButton" class="cursor-pointer openCreateModal">
                            <img src="https://icongr.am/entypo/plus.svg?size=128&color=ffffff" class="m-1 w-xs max-xl:w-xs h-fit">
                            <p class="max-w-sm text-2xl font-semibold">
                                Add to Inventory
                            </p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div id="inventoryModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50">
        <div class="relative flex flex-col p-6 rounded-lg shadow-lg w-96 gap-y-4 bg-sky-600 dark:bg-gray-800">
            <h2 class="text-xl font-bold text-white">Update</h2>
            
            <!-- Form with image upload -->
            <form id="updateInventoryForm" class="flex flex-col gap-y-4" action="{{ route('inventory.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="gamepad_name" placeholder="Name" class="p-2 text-black border border-white rounded-lg dark:text-white"/>
                <input type="text" name="platform" placeholder="Platform" class="p-2 text-black border border-white rounded-lg dark:text-white"/>
                <input type="number" name="price" step="0.01" placeholder="Price" class="p-2 text-black border border-white rounded-lg dark:text-white"/>
                <input type="text" name="gamepad_description" placeholder="Description" class="p-2 text-black border border-white rounded-lg dark:text-white"/>

                <!-- Image upload field -->
                <div class="flex flex-col gap-y-2">
                    <label for="gamepad_image" class="text-white">Product Image (2 MB)</label>
                    <input type="file" name="gamepad_image" id="gamepad_image" accept="image/*" class="p-2 text-white border border-white rounded-lg"/>
                </div>
                
                <input type="hidden" name="gamepad_id" value="">
                <button type="submit" class="px-4 py-2 mt-4 text-white bg-green-900 rounded cursor-pointer hover:bg-green-950 hover:text-gray-400">Save Changes</button>
            </form>
            
            <button id="closeInventoryModal" class="px-4 py-2 mt-4 text-white bg-red-800 rounded cursor-pointer hover:bg-red-900 dark:bg-red-900 dark:hover:bg-red-950 hover:text-gray-400">Close</button>
        </div>
    </div>

    <div id="addToInventoryModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50">
        <div class="relative flex flex-col p-6 rounded-lg shadow-lg w-96 gap-y-4 bg-sky-600 dark:bg-gray-800">
            <h2 class="text-xl font-bold text-white">Add To Inventory</h2>
            
            <!-- Form with image upload -->
            <form id="addToInventoryForm" class="flex flex-col gap-y-4" action="{{ route('inventory.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="text" name="gamepad_name" placeholder="Name" class="p-2 text-black border border-white rounded-lg dark:text-white"/>
                <input type="text" name="platform" placeholder="Platform" class="p-2 text-black border border-white rounded-lg dark:text-white"/>
                <input type="number" name="price" step="0.01" placeholder="Price" class="p-2 text-black border border-white rounded-lg dark:text-white"/>
                <input type="text" name="gamepad_description" placeholder="Description" class="p-2 text-black border border-white rounded-lg dark:text-white"/>
                
                <!-- Image upload field -->
                <div class="flex flex-col gap-y-2">
                    <label for="gamepad_image" class="text-white">Product Image (2 MB)</label>
                    <input type="file" name="gamepad_image" id="gamepad_image" accept="image/*" class="p-2 text-white border border-white rounded-lg"/>
                </div>
                
                <input type="hidden" name="gamepad_id" value="">
                <button type="submit" class="px-4 py-2 mt-4 text-white bg-green-900 rounded cursor-pointer hover:bg-green-950 hover:text-gray-400">Add Gamepad</button>
            </form>
            
            <button id="closeAddToInventoryModal" class="px-4 py-2 mt-4 text-white bg-red-800 rounded cursor-pointer hover:bg-red-900 dark:bg-red-900 dark:hover:bg-red-950 hover:text-gray-400">Close</button>
        </div>
    </div>

    <script>
        document.querySelectorAll(".openInventoryModal").forEach((button) => {
            button.addEventListener("click", () => {
                const gamepadId = button.getAttribute('data-gamepad-id');
                const gamepadName = button.getAttribute('data-gamepad-name');
                const gamepadPlatform = button.getAttribute('data-gamepad-platform');
                const gamepadPrice = button.getAttribute('data-gamepad-price');
                const gamepadImage = button.closest('.flex.flex-col').querySelector('img[src*="assets/images/"]')?.src || '';
                const gamepadDescription = button.getAttribute('data-gamepad-description');
                const imageName = gamepadImage.split('/').pop();

                document.querySelector("#inventoryModal h2").textContent = "Update Gamepad Information";
                document.querySelector('input[name="gamepad_name"]').value = gamepadName;
                document.querySelector('input[name="platform"]').value = gamepadPlatform;
                document.querySelector('input[name="price"]').value = gamepadPrice;
                document.querySelector('input[name="gamepad_id"]').value = gamepadId;
                document.querySelector('input[name="gamepad_description"]').value = gamepadDescription;
                
                // Display current image name
                const currentImageElement = document.getElementById('currentImageName');
                if (currentImageElement && imageName) {
                    currentImageElement.textContent = imageName;
                } else if (currentImageElement) {
                    currentImageElement.textContent = "No image";
                }

                document.getElementById("inventoryModal").classList.remove("hidden");
            });
        });

        document.querySelectorAll(".openCreateModal").forEach((button) => {
            button.addEventListener("click", () => {
                const gamepadId = button.getAttribute('data-gamepad-id');
                const gamepadName = button.getAttribute('data-gamepad-name');
                const gamepadPlatform = button.getAttribute('data-gamepad-platform');
                const gamepadPrice = button.getAttribute('data-gamepad-price');
                const gamepadImage = button.closest('.flex.flex-col').querySelector('img[src*="assets/images/"]')?.src || '';
                const imageName = gamepadImage.split('/').pop();

                document.querySelector("#inventoryModal h2").textContent = "Add to Inventory";           

                document.getElementById("addToInventoryModal").classList.remove("hidden");
            });
        });

        document.getElementById('updateInventoryForm').addEventListener('submit', async (event) => {
            event.preventDefault();
            
            const form = event.target;
            const formData = new FormData(form);
            
            try {
                const response = await fetch("{{ route('inventory.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });
                
                const responseText = await response.text();
                console.log('Raw response:', responseText);
                
                let result;
                try {
                    result = JSON.parse(responseText);
                } catch (e) {
                    console.error("Invalid JSON response:", responseText);
                    throw new Error("Invalid server response format");
                }
                
                if (!response.ok) {
                    throw new Error(result.message || 'Request failed');
                }

                if (result.success) {
                    const gamepadId = formData.get('gamepad_id');
                    const gamepadName = formData.get('gamepad_name');
                    const platform = formData.get('platform');
                    const price = formData.get('price');
                    
                    // Find the gamepad card
                    const button = document.querySelector(`button[data-gamepad-id="${gamepadId}"]`);
                    if (!button) {
                        console.error('Button not found for gamepad ID:', gamepadId);
                        alert('Updated successfully but UI could not be refreshed. Please reload the page.');
                        document.getElementById("inventoryModal").classList.add("hidden");
                        return;
                    }
                    
                    const gamepadCard = button.closest('.flex.flex-col');
                    
                    // Update attributes on the button
                    button.setAttribute('data-gamepad-name', gamepadName);
                    button.setAttribute('data-gamepad-platform', platform);
                    button.setAttribute('data-gamepad-price', price);
                    
                    // Update text content
                    const nameElement = gamepadCard.querySelector('p.max-w-sm.pt-6.text-2xl.font-semibold');
                    const priceElement = gamepadCard.querySelector('p.text-2xl:not(.max-w-sm)');
                    
                    if (nameElement) nameElement.textContent = gamepadName;
                    if (priceElement) priceElement.textContent = `$${price}`;
                    
                    // Update image if a new one was uploaded
                    if (result.data.gamepad_image) {
                        const imageElement = gamepadCard.querySelector('img[src*="assets/images/"]');
                        if (imageElement) {
                            // Force browser to reload the image by adding timestamp
                            const timestamp = new Date().getTime();
                            imageElement.src = `{{ asset('assets/images/') }}/${result.data.gamepad_image}?t=${timestamp}`;
                        }
                    }

                    // Close the modal
                    document.getElementById("inventoryModal").classList.add("hidden");
                    
                    // Show success message
                    alert('Gamepad updated successfully!');
                } else {
                    alert(result.message || 'Failed to update gamepad');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while updating the gamepad: ' + error.message);
            }
        });


        document.getElementById('addToInventoryForm').addEventListener('submit', async (event) => {
            event.preventDefault();
            
            const form = event.target;
            const formData = new FormData(form);
            
            try {
                const response = await fetch("{{ route('inventory.add') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });
                
                const responseText = await response.text();
                console.log('Raw response:', responseText);
                
                let result;
                try {
                    result = JSON.parse(responseText);
                } catch (e) {
                    console.error("Invalid JSON response:", responseText);
                    throw new Error("Invalid server response format");
                }
                
                if (!response.ok) {
                    throw new Error(result.message || 'Request failed');
                }

                if (result.success) {
                    const gamepadId = formData.get('gamepad_id');
                    const gamepadName = formData.get('gamepad_name');
                    const platform = formData.get('platform');
                    const price = formData.get('price');
                    
                    // Find the gamepad card
                    const button = document.querySelector(`button[data-gamepad-id="${gamepadId}"]`);
                    if (!gamepadId) {
                        const container = document.getElementById('your-gamepad-list-container'); // Update with actual container ID

                        const card = document.createElement('div');
                        card.className = 'flex flex-col ...'; // Use the same class structure as existing cards
                        card.innerHTML = `
                            <img src="{{ asset('assets/images') }}/${result.data.gamepad_image}" alt="Gamepad Image" class="...">
                            <p class="max-w-sm pt-6 text-2xl font-semibold">${result.data.gamepad_name}</p>
                            <p class="text-2xl">$${result.data.price}</p>
                            <button data-gamepad-id="${result.data.gamepad_id}" ...>Edit</button>
                        `;

                    }

                    // Close the modal
                    document.getElementById("addToInventoryModal").classList.add("hidden");
                    
                    // Show success message
                    alert('Gamepad added successfully!');
                } else {
                    alert(result.message || 'Failed to add gamepad');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while adding gamepad: ' + error.message);
            }
        });

        // Close modal functionality
        document.getElementById("closeInventoryModal").addEventListener("click", () => {
            document.getElementById("inventoryModal").classList.add("hidden");
        });

        document.getElementById("closeAddToInventoryModal").addEventListener("click", () => {
            document.getElementById("addToInventoryModal").classList.add("hidden");
        });
        
    </script>
</section>
@endsection