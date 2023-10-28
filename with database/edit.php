<?php
include("edit-logic.php");
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
                       
    ?>
        <section class="text-center p-28 space-y-10 flex flex-col items-center justify-center">            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="bg-gray-200 flex flex-col w-[40rem] gap-5 p-10 rounded-lg" autocomplete="off">
                <input type="text" name="name" id="name" aria-label="name" placeholder="Name" class="p-5 rounded-lg" value="<?php echo $row["name"]; ?>">
                <span class=" text-red-600">
                <?php echo $name_edit_error;?>                    
                </span>

                <input type="email" name="email" id="email" aria-label="email" placeholder="Email" class="p-5 rounded-lg" value="<?php echo $row["email"]; ?>">
                <span class=" text-red-600">
                <?php echo $email_edit_error;?>
                </span>

                <input type="date" name="dob" id="dob" aria-label="DOB" placeholder="DOB" class="p-5 rounded-lg" value="<?php echo $row["dob"]; ?>">
                <span class=" text-red-600">
                <?php echo $dob_edit_error;?>
                </span>

                <input type="password" name="password" id="password" aria-label="Password" placeholder="Old Password" class="p-5 rounded-lg" value="">
                <span class=" text-red-600">
                <?php echo $password_edit_error;?>
                </span>

                <input type="password" name="new-password" id="new-password" aria-label="Password" placeholder="New Password" class="p-5 rounded-lg" value="">
                <span class=" text-red-600">
                <?php ?>
                </span>

                <button type="submit" name="update" class="p-5 rounded-lg bg-gray-300 hover:bg-green-300 hover:text-white">Update</button>      
                
            </form>
        </section>
    </main>
</body>
</html>