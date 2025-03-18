<?php
echo '
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>iDiscuss</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  


  <style>
  .height{
    min-height: 90vh;
    }
  </style>
</head>';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
  echo '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
  <strong>Success!</strong> Loggedin successfully!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} 
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
  echo '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
  <strong>Failed!</strong> Incorrect Password!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "User not exist") {
  echo '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
  <strong>Failed!</strong> User not exist!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>