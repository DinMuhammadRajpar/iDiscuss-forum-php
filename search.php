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

<body>
    <?php include 'partials/_navbar.php'; ?>
    <?php include 'partials/_signupmodal.php'; ?>
    <?php include 'partials/_loginmodal.php'; ?>


    <!-- search results here -->.




    <div class="container height">
        <?php
        $searchResult = $_GET['search'];
        echo $_GET['search'];
        $searchResultError = true;
        $sql = "SELECT * FROM `threads` WHERE MATCH(thread_title, thread_desc) AGAINST ('$searchResult')";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            $search_thread_id = $row['thread_id'];
            $search_thread_title = $row['thread_title'];
            $search_thread_desc = $row['thread_desc'];
            $searchResultError = false;


            echo

                '<h3><a href="/php-prac/forum/thread.php?thread-id=' . $search_thread_id . '" class="text-dark">' . $search_thread_title . '</a></h3>
                <p>' . $search_thread_desc . '</p>
            ';
        }

        if($searchResultError){
            echo'
            
            <div class="container-fluid bg-light py-5">
                <div class="container text-center">
                    <p class="display-4">No Result Found for your search '.$searchResult.'</p>
                </div>
            </div>';
        }
        ?>
    </div>


    <?php include 'partials/_bootstrapscripts.php'; ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script> -->
</body>
<?php include 'partials/_footer.php'; ?>

</html>