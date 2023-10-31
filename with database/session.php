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
    
    // echo "<pre>";
    // var_dump($_FILES["photo"]);
    // echo $_FILES["photo"]["name"];
    // echo "</pre>";
    

    if (isset($_FILES["photo"])) {
        $file = $_FILES["photo"];
        $file_name=$_FILES["photo"]["name"];
        $ex = array("jpg", "jpeg", "png");
        $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
        echo $ext;
        echo "helllo";
        // echo in_array($ext, $ex);
        if (in_array($ext, $ex)) {
            echo "yes";
            $uploaded = "IMAGES/".$file_name;
            $_SESSION["session"]=$uploaded;  
            // $targetFile = $upload . $_FILES["name"];
            echo $uploaded."==================";
            // echo "-----------------------------".$targetFile;
            $unique_id=uniqid();            
        } else {
            $fileerr= "Invalid file type. Allowed file types: " . implode(", ", $ex);
        }
    }    
    $error = array();
    array_push($error, $nameerr, $emailerr, $doberr, $passworderr);

    if (isset($_POST['submit'])) {
        if (!strlen($nameerr) && !strlen($emailerr) && !strlen($doberr) && !strlen($passworderr) && !strlen($fileerr) && !strlen($upload_date_err)) {
            $conn = mysqli_connect('localhost', 'param', '161607', 'user');
            if (!$conn) {
                die('Could not connect: ' . mysqli_connect_error());
            }
            echo 'Connected successfully'; 
                      

                if (
                mysqli_query($conn, "INSERT INTO registration(email,name,dob,password) VALUES(
                '$_POST[email]',
                '$_POST[name]',
                '$_POST[dob]',
                '$_POST[password]'
                )")
                ) {
                    echo 'Successfull';
                } else {
                    echo mysqli_error($conn);
                }                

                if (move_uploaded_file($file["tmp_name"], $uploaded)) {
                    echo "yes";
                    $upload_date= date("d-m-y h:i:s"); 
                    if(mysqli_query($conn,"INSERT INTO file_task(email,image_name, unique_name, uploaded_date, modified_date) VALUES(
                            '$_POST[email]',
                            '$file_name',
                            '$unique_id',
                            '$upload_date',
                            '$upload_date'
                        )")){
                            echo "successfull";
                        }else{
                            $fileerr= mysqli_error($conn);
                        }
                    } else {
                        $fileerr= "file location error";
                    }

                mysqli_close($conn);

                
                header("location:loginform.php");
            
        }
    }
}
?>