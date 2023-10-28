<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    if (val_emptycheck($name)) {
        if (val_alphabets($name)) {
            $nameerr = "Only alphabets and whitespace are allowed.";
        }
    } else {
        $nameerr = "Please enter you name";
    }

    $email = $_POST['email'];
    if (val_emptycheck($email)) {
        if (val_email($email)) {
            $emailerr = "Invalid Format";
        }
    } else {
        $emailerr = "Please Enter Your Email Address";
    }

    $password = $_POST['password'];
    if (val_emptycheck($password)) {
        if (strlen($password) <= 8) {
            $passworderr = "Your Password Must Contain At Least 8 Characters!";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $passworderr = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $passworderr = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $passworderr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
    } else {
        $passworderr = "Please enter a password";
    }

    $dob = $_POST['dob'];
    if (empty($dob)) {
        $doberr = "Please Enter DOB";
    }
    $error = array();
    array_push($error, $nameerr, $emailerr, $doberr, $passworderr);
    
    if (isset($_POST['submit'])) {
        if (!strlen($nameerr) && !strlen($emailerr) && !strlen($doberr) && !strlen($passworderr)) {

            $conn = mysqli_connect('localhost', 'param', '161607', 'user');
            if (!$conn) {
                die('Could not connect: ' . mysqli_connect_error());
            }
            echo 'Connected successfully';
            
            if (mysqli_query($conn, "INSERT INTO registration(email,name,dob,password) VALUES(
                '$_POST[email]',
                '$_POST[name]',
                '$_POST[dob]',
                '$_POST[password]'
                )")) {
                echo 'Successfull';
            } else {
                echo mysqli_error($conn);
            }
            mysqli_close($conn);            
            header("location:loginform.php");
        }
    }
}

?>