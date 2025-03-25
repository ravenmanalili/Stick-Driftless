<?php 
  include('../../db_connection.php');
  $queryGamepads = "SELECT * FROM gamepad";
  $sqlGamepads = mysqli_query($connection, $queryGamepads);
?>

<section id="inventory" class="min-h-dvh mx-auto flex flex-col gap-4 pt-40 xl:px-40">
    <header id="inventoryHeader" class="flex flex-row justify-between">
        <div class="text-3xl font-semibold">Inventory Management</div>
        <div id="inventorySearchInputField" class="-m-4 max-xl:hidden">
            <form action="index.php?page=results" method="GET" class="relative flex items-center max-xl:flex-col">
                <input type="text" class="w-lg text-md m-4 rounded-lg border border-gray-300 p-3 px-20 font-semibold" placeholder="Search Inventory">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-12">
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
        <div class="grid grid-cols-4 gap-x-8 gap-y-8 max-xl:grid-cols-1 max-xl:gap-x-4 max-md:grid-cols-1">
            <?php 
                while($results = mysqli_fetch_array($sqlGamepads)) 
                { ?>
            <div class="flex flex-col items-center justify-center">
                <div class="relative flex h-full flex-col items-center justify-center rounded-lg border border-black p-2 dark:border-gray-100">
                    <button class="openInventoryModal min-h-12 max-h-12 cursor-pointer" 
                            data-gamepad-id="<?php echo $results['gamepad_id']; ?>"
                            data-gamepad-name="<?php echo $results['gamepad_name']; ?>"
                            data-gamepad-platform="<?php echo $results['platform']; ?>"
                            data-gamepad-price="<?php echo $results['price']; ?>">
                        <img src="https://icongr.am/entypo/edit.svg?size=20&color=000000" class="absolute right-4 top-4 block h-8 w-8 dark:hidden">
                        <img src="https://icongr.am/entypo/edit.svg?size=20&color=ffffff" class="absolute right-4 top-4 hidden h-8 w-8 dark:block">
                    </button>
                            <div class="min-h-80 max-h-80">
                                <img src="../../assets/images/<?php echo $results['gamepad_image']?>" class="w-sm max-xl:w-xs m-1 h-fit">
                            </div>
                            <p class="max-w-sm pt-6 text-2xl font-semibold">
                                <?php echo $results['gamepad_name'] ?>
                            </p>
                            <p class="text-2xl">
                                <?php echo sprintf('$%s', $results['price']); ?>
                            </p>
                        </div>
                    </div>
            <?php  
                } ?>
        </div>
    </div>

    <div id="inventoryModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/50">
        <div class="relative flex w-96 flex-col gap-y-4 rounded-lg bg-sky-600 p-6 shadow-lg dark:bg-gray-800">
            <form class="update-inventory flex flex-col gap-y-4" action="/inventory/inventory.php" method="post">
                <h2 class="text-xl font-bold text-white">Update</h2>
                <input type="text" name="updateControllerName" placeholder="Name" class="rounded-lg border border-white p-2 text-white"/>
                <input type="text" name="updateControllerPlatform" placeholder="Platform" class="rounded-lg border border-white p-2 text-white"/>
                <input type="number" name="updateControllerPrice" step="0.01" placeholder="Price" class="rounded-lg border border-white p-2 text-white"/>
                <button type="submit" class="mt-4 cursor-pointer rounded bg-green-800 px-4 py-2 text-white hover:bg-green-900">Save Changes</button>
            </form>
            <button id="closeInventoryModal" class="mt-4 cursor-pointer rounded bg-red-800 px-4 py-2 text-white hover:bg-red-900 dark:bg-red-900 dark:hover:bg-red-800">Close</button>
        </div>
    </div>

<script>
    document.querySelectorAll(".openInventoryModal").forEach((button) => {
        button.addEventListener("click", () => {
            const gamepadId = button.getAttribute('data-gamepad-id');
            const gamepadName = button.getAttribute('data-gamepad-name');
            const gamepadPlatform = button.getAttribute('data-gamepad-platform');
            const gamepadPrice = button.getAttribute('data-gamepad-price');

            // Update modal header with gamepad ID
            document.querySelector("#inventoryModal h2").textContent = `Update Gamepad #${gamepadId}`;

            // Populate form fields
            document.querySelector('input[name="updateControllerName"]').value = gamepadName;
            document.querySelector('input[name="updateControllerPlatform"]').value = gamepadPlatform;
            document.querySelector('input[name="updateControllerPrice"]').value = gamepadPrice;

            // Add hidden input for gamepad_id to use in form submission
            const existingHiddenInput = document.querySelector('input[name="gamepad_id"]');
            if (!existingHiddenInput) {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'gamepad_id';
                hiddenInput.value = gamepadId;
                document.querySelector('.update-inventory').appendChild(hiddenInput);
            } else {
                existingHiddenInput.value = gamepadId;
            }

            document.getElementById("inventoryModal").classList.remove("hidden");
        });

        // Update form submission to use AJAX
        document.querySelector('.update-inventory').addEventListener('submit', async (event) => {
            event.preventDefault(); // Prevent the default form submission

            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch('/pages/inventory/update_inventory.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const result = await response.json();

                if (result.success) {
                    // Update the specific gamepad card in the DOM
                    const gamepadCard = document.querySelector(`button[data-gamepad-id="${formData.get('gamepad_id')}"]`).closest('.flex.flex-col');
                    
                    // Update name
                    const nameElement = gamepadCard.querySelector('p:nth-child(3)');
                    if (nameElement) {
                        nameElement.textContent = formData.get('updateControllerName');
                    }

                    // Update price
                    const priceElement = gamepadCard.querySelector('p:nth-child(4)');
                    if (priceElement) {
                        priceElement.textContent = `$${formData.get('updateControllerPrice')}`;
                    }

                    // Close the modal
                    document.getElementById("inventoryModal").classList.add("hidden");
                } else {
                    // Handle error silently
                    console.error(result.message || 'Failed to update gamepad');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });

    // Close modal functionality
    document.getElementById("closeInventoryModal").addEventListener("click", () => {
        document.getElementById("inventoryModal").classList.add("hidden");
    });
</script>
</section>
