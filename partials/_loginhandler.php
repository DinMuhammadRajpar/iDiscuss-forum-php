<?php
$showError = "false";
$method = $_SERVER['REQUEST_METHOD'];
echo $method;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';
    $loginemail = $_POST['loginemail'];
    $loginpass = $_POST['loginpassword'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$loginemail'";
    $result = mysqli_query($conn, $sql);

    $numRow = mysqli_num_rows($result);

    if($numRow == 1){

        $row = mysqli_fetch_assoc($result);
        if(password_verify($loginpass, $row['user_password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['email'] = $loginemail;
            header('Location: /php-prac/forum/index.php?loginsuccess=true');
            exit;
        } else{
            header('Location: /php-prac/forum/index.php?loginsuccess=false');
        } 
    } else{
        $showError = "User not exist";
    }
    header('Location: /php-prac/forum/index.php?loginsuccess='.$showError.'');
} 


?>