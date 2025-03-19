<?php
include 'partials/_dbconnect.php';
include 'partials/_header.php';

$noti = false;
$notiMessage = "false";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $noti = true;

  $sql = "INSERT INTO `contact` (`username`, `email`, `message`, `time`) VALUES ('$name', '$email', '$message', current_timestamp())";
  $result = mysqli_query($conn, $sql);
  $notiMessage = "Thanks for contacting. Your querry noted successfully.";
} 

?>

<body>
  <?php include 'partials/_navbar.php'; ?>
  <?php include 'partials/_signupmodal.php'; ?>
  <?php include 'partials/_loginmodal.php'; ?>

  <?php

  if ($noti) {
    echo '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success!</strong>   ' . $notiMessage . ' 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  } 
  ?>


  <div class="container height my-5">

    <h2 class="text-center">Let's Get Connected</h2>
    <form action="contact.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Email address</label>
        <input type="text" class="form-control" id="name" placeholder="Username" name="name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Example textarea</label>
        <textarea class="form-control" id="message" rows="3" name="message"></textarea>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
    </form>
  </div>



  <?php include 'partials/_bootstrapscripts.php'; ?>


</body>
<?php include 'partials/_footer.php'; ?>

</html>