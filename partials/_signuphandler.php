<?php
$showError = "false";
$method = $_SERVER['REQUEST_METHOD'];
if ($method) {
    include '_dbconnect.php';

    $useremail = $_POST['signupemail'];
    $userpassword = $_POST['signuppassword'];
    $usercpassword = $_POST['signupconfirmpassword'];

    $existsql = "SELECT * FROM `users` WHERE user_email = '$useremail'";
    $result = mysqli_query($conn, $existsql);
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $showError = 'user already exist' . mysqli_error($conn);
    } else {
        if ($userpassword == $usercpassword) {
            $hash = password_hash($userpassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_password`,`created_at`) VALUES ('$useremail', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = "User successfully added";
                header('Location: /php-prac/forum/index.php?signupsuccess=true');
                exit;
            }

        }
        else {
            $showError = "Invalid password!";
            
        }
    }
    header("Location: /php-prac/forum/index.php?signupsuccess=$showError");
}


?>