<?php
$email_error = $password_error = '';
$email_login = $password_login = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email_login = $_POST['email-login'];
    $password_login = $_POST['password-login'];
    $conn = mysqli_connect('localhost', 'param', '161607', 'user');
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }
    echo 'Connected successfully';

    $email_login = mysqli_real_escape_string($conn, $email_login);
    $password_login = mysqli_real_escape_string($conn, $password_login);
    $sql = "SELECT * FROM registration WHERE email = '$email_login'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<br>";
        echo $row['password'];       
        if ($password_login == $row['password']) { 
            echo "yes matched";           
            $_SESSION['login'] = $_POST['email-login'];
            $_SESSION['password'] = $password_login;
            header("location:dashboard.php");            
        }
        else{
            $password_error = "Please enter correct password";
        }
    } else {
        $email_error = "Please resiter yourself";
    }
    mysqli_close($conn); 
}
?>