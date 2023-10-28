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
    // echo "array:<br>";
    // print_r($error);
    // echo "<br>empty<br>";
    // var_dump(empty($error));
    // $correct = array();
    // array_push($correct, $name, $email, $dob, $password);
    // // print_r($correct);


    if (isset($_POST['submit'])) {
        if (!strlen($nameerr) && !strlen($emailerr) && !strlen($doberr) && !strlen($passworderr)) {
            $_SESSION['user'][$_POST['email']] = $_POST;
            foreach ($_SESSION as $key => $value) {
                echo "<pre>";
                print_r($value);
                echo "</pre>";
            }
            header("location:loginform.php");
        }
    }
}

?>