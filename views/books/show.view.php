<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
       <ul>
        <?php foreach($books as $book) : ?>
            <li>
                <h2><?= $book['name'] ?></h2>
                <br><br>
            <li>
        <?php endforeach?>
       </ul>
       
    </div>
  </main>


  <?php require "partials/footer.php"?>


