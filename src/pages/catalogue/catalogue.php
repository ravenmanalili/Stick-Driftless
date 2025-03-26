<?php 
  include('../../db_connection.php');
  $queryGamepads = "SELECT * FROM gamepad";
  $sqlGamepads = mysqli_query($connection, $queryGamepads);

?>

<h1 class="flex py-7 text-center text-4xl font-semibold max-xl:justify-center max-xl:pt-24 xl:justify-start xl:px-32 xl:pt-40">Featured</h1>
  <section id="catalogueControllers" class="flex flex-col items-center justify-center pb-40">
    <div id="product-container" class="grid grid-cols-4 gap-x-8 gap-y-8 max-xl:grid-cols-1 max-xl:gap-x-4 max-md:grid-cols-1">
      <?php 
        while($results = mysqli_fetch_array($sqlGamepads)) 
          { ?>
            <div class="flex flex-col items-center justify-center">
              <a href="index.php?page=product-details" class="flex h-96 transform items-center justify-center rounded-lg border border-black transition duration-500 hover:scale-110 dark:border-gray-100">
                  <img src="../../assets/images/<?php echo $results['gamepad_image']?>" class="w-sm max-xl:w-xs m-1 h-fit">
              </a>
              <p class="max-w-sm cursor-pointer pt-6 text-2xl font-semibold">
                <?php echo $results['gamepad_name'] ?>
              </p>
              <p class="cursor-pointer text-2xl">
                <?php echo sprintf('$%s', $results['price']); ?>
              </p>
            </div>
      <?php  
            } ?>
    </div>
  </section>

    