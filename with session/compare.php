<?php
$email_error = $password_error = '';
$email_login = $password_login = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email_login = $_POST['email-login'];
    $password_login = $_POST['password-login'];
    if(in_array($email_login, array_keys($_SESSION['user'])))
        {     
            if ($_SESSION['user'][$email_login]['password'] == $password_login) {
                $search=$_SESSION['user'][$email_login]['password'] == $password_login;
                $_SESSION['login'] = $_POST['email-login'];  
                header("location:dashboard.php");              
            }
            $password_error = "Please enter correct password";
        }
    else
    {
        $email_error="Please resiter yourself";
    }    
}
?>