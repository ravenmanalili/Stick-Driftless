<?php 
  include('../../db_connection.php');
  $queryGamepads = "SELECT * FROM gamepad";
  $sqlGamepads = mysqli_query($connection, $queryGamepads);

?>

<section id="inventory" class="min-h-dvh mx-auto flex flex-col gap-4 pt-40 xl:px-40">
    <header id="inventoryHeader" class="flex flex-row justify-between">
        <div class="text-3xl font-semibold">Inventory Management</div>
        <div class="text-md">Search</div>
    </header>

    <div id="inventoryCategory" class="flex justify-between">
        <div class="flex flex-row gap-4 text-xl">
            <div>All</div>
            <div>PlayStation</div>
            <div>Xbox</div>
            <div>Nintendo</div>
            <div>Retro</div>
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
                            <button class="cursor-pointer">
                                <img src="https://icongr.am/entypo/edit.svg?size=20&color=ffffff" class="absolute right-4 top-4 h-8 w-8">
                            </button>
                            <img src="../../assets/images/<?php echo $results['gamepad_image']?>" class="w-sm max-xl:w-xs m-1 h-fit">
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

    

</section>



