<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
       <ul>
        <?php foreach($books as $book) : ?>
            <li>
                <h1 color = 'orange'><?= $book['name'] ?></h1>
                <br>
                <h4>Author :  <?= $book['author'] ?></h4>
                <br>
                <h4>Release Date :  <?= $book['releaseDate'] ?></h4>
                <br>
                <h4 color = 'green'>Price :  <?= $book['price'] ?></h4>
                <br>
            </li>
            <form  method = "POST" action = '/buy' >
                <input type = "hidden" name = "name" value="<?= $book['name'] ?>">


                <button class = "text-sm text-blue-500 "> Buy it! </button>

            </form>
            <br><br><br>
        <?php endforeach?>
       </ul>
       
    </div>
  </main>


  <?php require "partials/footer.php"?>


