<?php
include 'partials/_dbconnect.php';
include 'partials/_header.php';
?>

<body>
    <?php
    include 'partials/_navbar.php';
    include 'partials/_signupmodal.php';
    include 'partials/_loginmodal.php';

    $id = $_GET['catid'];

    $sql = "SELECT * FROM `categories` WHERE category_id = $id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['category_name'];
        $desc = $row['category_description'];
    }

    ?>


    <?php
    $alert = false;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $thread_user_id = $_SESSION['id'];
    }

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $alert = true;
        $th_title = mysqli_real_escape_string($conn, $_POST['question_title']);
        $th_detail = mysqli_real_escape_string($conn, $_POST['detail']);
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `created_at`) VALUES ('$th_title', '$th_detail', '$id', '$thread_user_id', current_timestamp())";
        $result = mysqli_query($conn, $sql);

    }

    if ($alert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Question added successfully. Wait for the community to answer.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    ?>






    <div class="container my-4">
        <div class="bg-light p-5 rounded shadow">
            <h1 class="display-4">Welcome to <?php echo $name; ?> Forums</h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


        echo '
    <div class="container">
        <h2>Ask a Question</h2>
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
            <div class="mb-3">
                <label for="question_title" class="form-label">Question Title</label>
                <input type="text" class="form-control" id="question_title" name="question_title"
                    aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Provide Details</label>
                <textarea class="form-control" id="detail" rows="3" name="detail"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
    } else {
        echo '<div class="container">
                <p class="lead">Please loggin first to add a question.</p>
            </div>';
    }
    ?>

    <div class="container height">
        <h2>Browse Question</h2> <?php

        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
        $result = mysqli_query($conn, $sql);
        $getResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $getResult = false;
            $thread_id = $row['thread_id'];
            $thread_title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $timestamp = $row['created_at'];
            $thread_user_id = $row['thread_user_id'];

            $sql2 = "SELECT * FROM `users` WHERE user_id = $thread_user_id";
            $result2 = mysqli_query($conn, $sql2);

            $row2 = mysqli_fetch_assoc($result2);

            $user_email = $row2['user_email'];

            $thread_title = str_replace("<", "&lt;", $thread_title);
            $thread_title = str_replace(">", "&gt;", $thread_title);

            $desc = str_replace("<", "&lt;", $desc);
            $desc = str_replace(">", "&gt;", $desc);





            echo '
        <div class="d-flex mb-4 align-items-center">
            <div class="flex-shrink-0">
                <img src="assets/defaultuser.png" width="50px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3 d-flex gap-4">
                <div><h5><a href="thread.php?thread-id=' . $thread_id . '">' . $thread_title . '</a></h5>
                <p>' . $desc . '</p>
                </div>
                <div><p>By:<b>' . $user_email . ' ' . $timestamp . '</b></p></div>
            </div>
        </div>';
        }

        if ($getResult) {
            echo '
            <div class="container-fluid bg-light py-5">
                <div class="container text-center">
                    <p class="display-4">No Question Found!</p>
                    <p class="lead">Be the first one to ask a Question</p>
                </div>
            </div>';
        }

        ?>

    </div>



    <?php include 'partials/_bootstrapscripts.php'; ?>


</body>
<?php include 'partials/_footer.php'; ?>

</html>