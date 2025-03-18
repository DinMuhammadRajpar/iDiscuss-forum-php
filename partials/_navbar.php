<?php

session_start();

echo '
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark " data-bs-theme="dark">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php">iDuscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Top Categories
        </a>
        <ul class="dropdown-menu">';

$sql = "SELECT category_id, category_name FROM `categories` LIMIT 3";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  echo '<li><a class="dropdown-item" href="/php-prac/forum/threadlist.php?catid=' . $row['category_id'] . '">' . $row['category_name'] . '</a></li>';
}


// <li><a class="dropdown-item" href="#">Another action</a></li>
// <li><hr class="dropdown-divider"></li>
// <li><a class="dropdown-item" href="#">Something else here</a></li>

echo '
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="contact.php">Contact</a>
      </li>
    </ul>
    
    
    <form class="d-flex" role="search" action="search.php" method="get">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success me-2" type="submit">Search</button>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  echo
    '
      <p class="text-light my-0 mx-2">Welcome ' . $_SESSION["email"] . '</p>
      <a href="/php-prac/forum/partials/_logout.php" class="btn btn-outline-success me-2 d-flex align-items-center justify-content-center" type="button">Logout</a>
    </form>';
} else {
  echo '
      <button class="btn  bg-success text-light me-2" type="button" data-bs-toggle="modal" data-bs-target="#login">Login</button>
      <button class="btn btn-outline-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#signup">Signup</button>
    </form>';
}
echo '
  </div>
</div>
</nav>';
?>