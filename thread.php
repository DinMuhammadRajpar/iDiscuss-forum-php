<?php
include 'partials/_dbconnect.php';
include 'partials/_header.php';
?>

<body>
    <?php
    include 'partials/_navbar.php';
    include 'partials/_signupmodal.php';
    include 'partials/_loginmodal.php';

    $id = $_GET['thread-id'];

    $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $name = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];
    }


    ?>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $comment_by = $_SESSION['id'];
    }

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);

        $sql = "INSERT INTO `comments` (`comment_text`, `thread_id`, `comment_by`, `posted_at`) VALUES ('$comment', '$id', '$comment_by', current_timestamp())";
        $result = mysqli_query($conn, $sql);


    }

    $sql2 = "SELECT * FROM `users` WHERE user_id = $thread_user_id";
    $result2 = mysqli_query($conn, $sql2);

    $row2 = mysqli_fetch_assoc($result2);

    $user_email = $row2['user_email'];



    ?>


    <div class="container my-4">
        <div class="bg-light p-5 rounded shadow">
            <h1 class="display-4"><?php echo $name; ?> </h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p><b>Posted by: <?php echo $user_email; ?></b></p>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '
    <div class="container">
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
            <div class="mb-3">
                <label for="comment" class="form-label">Add your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div> ';
    } else {
        echo '<div class="container">
                <p class="lead">Please loggin first to add a comment.</p>
            </div>';
    }
    ?>

    <div class="container height">
        <h2>Discussion</h2>
        <?php

        $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
        $result = mysqli_query($conn, $sql);
        $getResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $getResult = false;
            $comment = $row['comment_text'];
            $comment_by = $row['comment_by'];


            $sql3 = "SELECT * FROM `users` WHERE user_id = $comment_by";
            $result3 = mysqli_query($conn, $sql3);

            $row3 = mysqli_fetch_assoc($result3);

            $user_email = $row3['user_email'];

            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment); 



            echo '
        <div class="d-flex mb-4 align-items-center">
            <div class="flex-shrink-0">
                <img src="assets/defaultuser.png" width="50px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <p>' . $comment . '</p>
                <p><b>By: '.$user_email.'</b></p>
            </div>
        </div>';
        }

        if ($getResult) {
            echo '
            <div class="container-fluid bg-light py-5">
                <div class="container text-center">
                    <p class="display-4">No Comment Found!</p>
                    <p class="lead">Be the first one to Help</p>
                </div>
            </div>';
        }

        ?>

    </div>



    <?php include 'partials/_bootstrapscripts.php'; ?>


</body>
<?php include 'partials/_footer.php'; ?>

</html>