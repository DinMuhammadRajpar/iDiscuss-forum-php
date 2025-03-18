<?php
include 'partials/_dbconnect.php';
include 'partials/_header.php';
?>



<!-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head> -->

<body >
  <?php include 'partials/_navbar.php'; ?>
  <?php include 'partials/_signupmodal.php'; ?>
  <?php include 'partials/_loginmodal.php'; ?>


  <?php

  $sql = "SELECT * FROM `categories`";
  $result = mysqli_query($conn, $sql);



  ?>

  <div class="container-fluid p-0">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="\php-prac\forum\assets\slider-1.jpg" class="d-block w-100 h-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="\php-prac\forum\assets\slider-2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="\php-prac\forum\assets\slider-4.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <h2 class="text-center my-4">Tech Forum</h2>
  <div class="container height">
    <div class="row">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $category_description = $row['category_description'];
        echo '
      <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
          <img src="\php-prac\forum\assets\category-' . $category_id . '.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><a href="threadlist.php?catid='.$category_id.'">'. $category_name .'</a></h5>
            <p class="card-text">' . substr($category_description, 0, 90) . '</p>
            <a href="#" class="btn btn-primary">View Threads</a>
          </div>
        </div>
      </div>';
      }
      ?>
    </div>
  </div>
  

  <?php include 'partials/_bootstrapscripts.php'; ?>
  
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script> -->
</body>
<?php include 'partials/_footer.php'; ?>
</html>