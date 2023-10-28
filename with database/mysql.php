<?php
$conn = mysqli_connect('localhost', 'param', '161607','user');
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}
echo 'Connected successfully';
// $create = "INSERT INTO registration VALUES(
//     'jyoti@gmail.com',
//     'jyoti',
//     '2000-10-02',
//     'jyoti#12345'
// )";
//  if(mysqli_query($conn, $create)) {
//     echo 'Successfull';
//  }else{
//     echo mysqli_error($conn);
//  }

//  if(mysqli_query($conn, "ALTER TABLE registration MODIFY email varchar(50)")) {
//     echo 'Successfull';
//  }else{
//     echo mysqli_error($conn);
//  }

if(mysqli_query($conn,'select email from registration where email="jyoti@gmail.com"'))
{
    echo "success full";
}

mysqli_close($conn);
?>