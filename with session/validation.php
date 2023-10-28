<?php
session_start();
$name = $email = $password = $dob = "";
$nameerr = $emailerr = $passworderr = $doberr = "";
function my_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function val_emptycheck($data)
{
    return !empty($data);
}

function val_alphabets($data)
{
    return !preg_match("/^[a-zA-z' ]*$/", $data);
}

function val_email($data)
{
    return !filter_var($data, FILTER_VALIDATE_EMAIL);
}

   



?>