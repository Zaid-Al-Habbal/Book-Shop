<?php require "partials/header.php"?>

  <?php require "partials/nav.php"?>

  <?php require "partials/banner.php"?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
       <?php if($_SESSION['user']['email']) : ?>
          <p> Hello Mr/Ms, <?= $_SESSION['user']['name']?> <br> welcome to BookShop</p> 
        <?php else : ?>
          <p> Welcome to BookShop <br> please Log In or register to buy new books</p>
        <?php endif ?>
      
       
    </div>
  </main>


  <?php require "partials/footer.php"?>


