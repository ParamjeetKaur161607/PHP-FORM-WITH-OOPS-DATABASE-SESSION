<?php
include("validation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<main>
    <?php        
        $log = $_SESSION['login'];        
        $conn = mysqli_connect('localhost', 'param', '161607', 'user');
        if (!$conn) {
            die('Could not connect: ' . mysqli_connect_error());
        }
        $sql = "SELECT * FROM registration WHERE email='$log'";
        $result=mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $file_sql = "SELECT * FROM file_task WHERE email='$log'";
        $file_result=mysqli_query($conn, $file_sql);
        $file_row = mysqli_fetch_assoc($file_result);        
        // echo $file_row["image_name"];
        $_SESSION["db_password"]=$row["password"];
                       
    ?>
        <section class="text-center p-28 space-y-10 flex flex-col items-center justify-center">            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="bg-gray-200 flex flex-col w-[40rem] gap-5 p-10 rounded-lg" autocomplete="off" enctype="multipart/form-data">
                <input type="text" name="name" id="name" aria-label="name" placeholder="Name" class="p-5 rounded-lg" value="<?php echo $row["name"]; ?>">
                <span class=" text-red-600">
                <?php echo $user_object->nameerr;?>                    
                </span>

                <input type="email" name="email" id="email" aria-label="email" placeholder="Email" class="p-5 rounded-lg" value="<?php echo $row["email"]; ?>">
                <span class=" text-red-600">
                <?php echo $user_object->emailerr;?>
                </span>

                <input type="date" name="dob" id="dob" aria-label="DOB" placeholder="DOB" class="p-5 rounded-lg" value="<?php echo $row["dob"]; ?>">
                <span class=" text-red-600">
                <?php echo $user_object->doberr;?>
                </span>

                <input type="password" name="old" id="old" aria-label="Password" placeholder="Old Password" class="p-5 rounded-lg" value="">
                <span class=" text-red-600">
                <?php echo $user_object->passerr; ?>
                </span>

                <input type="password" name="new-password" id="password" aria-label="Password" placeholder="New Password" class="p-5 rounded-lg" value="">
                <span class=" text-red-600">
                <?php echo $user_object->passworderr; ?>
                </span>

                <div class="flex justify-between">
                <input type="file" name="photo" id="photo" value="">
                <?php 
                if(empty($file_row)){
                    echo "no file uploaded yet";
                }else{                
                    echo $file_row["image_name"];                    
                }
                ?>
                </div>
                <span class=" text-red-600">                    
                    <?php echo $user_object->fileerr; ?>
                </span>

                <button type="submit" name="update" class="p-5 rounded-lg bg-gray-300 hover:bg-green-300 hover:text-white">Update</button>      
                
            </form>
        </section>
    </main>
</body>
</html>