<?php
include("validation.php");
include("session.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_edit = $_POST['name'];
    if (val_emptycheck($name_edit)) {
        if (val_alphabets($name_edit)) {
            $name_edit_error = "Only alphabets and whitespace are allowed.";
        }
    } else {
        $name_edit_error = "Please enter you name";
    }

    $email_edit = $_POST['email'];
    if (val_emptycheck($email_edit)) {
        if (val_email($email_edit)) {
            $email_edit_error = "Invalid Format";
        }
    } else {
        $email_edit_error = "Please Enter Your Email Address";
    }

    $password_edit = $_POST['password'];
    if (empty($password_edit)) 
         {
        $password_edit_error = "Please enter a password";
    }

    $new_password = $_POST['new-password'];
    if (strlen($new_password) <= 8) {
        $new_password_edit_error = "Your Password Must Contain At Least 8 Characters!";
    } elseif (!preg_match("#[0-9]+#", $password)) {
        $new_password_edit_error = "Your Password Must Contain At Least 1 Number!";
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $new_password_edit_error = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $new_password_edit_error = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
 

    $dob_edit = $_POST['dob'];
    if (empty($dob_edit)) {
        $dob_edit_error = "Please Enter DOB";
    }
    
    $conn = mysqli_connect('localhost', 'param', '161607', 'user');
            if (!$conn) {
                die('Could not connect: ' . mysqli_connect_error());
            }
            
            $email_log= $_SESSION["login"];
            $sql = "SELECT * FROM registration where email='$email_log'";
            $result=mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($result);          

            
    if (isset($_POST['update'])) {
        // echo "hello";
        if (!strlen($name_edit_error) && !strlen($email_edit_error) && !strlen($dob_edit_error) && !strlen($password_edit_error)) {
            if($password == $row1['password']){
                $name_update = "UPDATE registration SET name='$name_edit' where email='$email_log'";
                $name_updated = mysqli_query($conn, $name_update);

                $email_update = "UPDATE registration SET email='$email_edit' where email='$email_log'";
                $email_updated = mysqli_query($conn, $email_update);

                $dob_update = "UPDATE registration SET dob='$dob_edit' where email='$email_log'";
                $dob_updated = mysqli_query($conn, $dob_update);

                $password_update = "UPDATE registration SET password='$new_password' where email='$email_log'";
                $password_updated = mysqli_query($conn, $password_update);

                header("location:loginform.php");
                
            }
            else{
                $password_edit_error= "Please enter correct password";
            }          
        }
    }
}

?>