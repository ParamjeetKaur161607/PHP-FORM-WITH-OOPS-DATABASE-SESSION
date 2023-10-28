<?php
$conn = mysqli_connect('localhost', 'param', '161607');
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}
echo 'Connected successfully';
$create_database="create DATABASE practice";
 if(mysqli_query($conn, $create_database)) {
    echo 'Database Created Successfully';
 }else{
    echo mysqli_error($conn);
 }
mysqli_close($conn);
?>