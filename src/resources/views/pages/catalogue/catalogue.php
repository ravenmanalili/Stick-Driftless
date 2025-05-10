<?php 
  include('../../db_connection.php');
  $queryGamepads = "SELECT * FROM gamepad";
  $sqlGamepads = mysqli_query($connection, $queryGamepads);
?>

<h1 class="flex text-4xl font-semibold text-center py-7 max-xl:justify-center max-xl:pt-24 xl:justify-start xl:px-32 xl:pt-40">Featured</h1>
  <section id="catalogueControllers" class="flex flex-col items-center justify-center pb-40">
    <div id="product-container" class="grid grid-cols-4 gap-x-8 gap-y-8 max-xl:grid-cols-3 max-xl:gap-x-4 max-md:grid-cols-1">
      <?php 
        while($results = mysqli_fetch_array($sqlGamepads)) 
          { ?>
            <div class="flex flex-col items-center justify-center">
              <a href="index.php?page=product-details" class="flex items-center justify-center transition duration-500 transform border border-black rounded-lg h-96 hover:scale-110 dark:border-gray-100">
                  <img src="../../assets/images/<?php echo $results['gamepad_image']?>" class="m-1 w-sm max-xl:w-xs h-fit">
              </a>
              <a href="index.php?page=product-details" class="max-w-sm pt-6 text-2xl font-semibold cursor-pointer">
                <?php echo $results['gamepad_name'] ?>
              </a>
              <a href="index.php?page=product-details" class="text-2xl">
                <?php echo sprintf('$%s', $results['price']); ?>
              </a>
            </div>
      <?php  
            } ?>
    </div>
  </section>

    