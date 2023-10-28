<?php
include("validation.php");
include("session.php");
include("compare.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black">    
    <main>
        <h1 class="text-center text-5xl font-bold text-white py-10 underline">Users Details</h1>
        <ul class="p-20 rounded-md flex gap-5">
            <li class="bg-white rounded-md px-5 py-10 text-lg w-[30rem]">     
            <h1 class="text-xl font-bold underline pb-5">Loged In user</h1>
                <?php
                echo "<b>";
                // echo $_SESSION['login'];
                $log_in=$_SESSION['login'];
                echo "</b>";
                $conn = mysqli_connect('localhost', 'param', '161607', 'user');
                if (!$conn) {
                    die('Could not connect: ' . mysqli_connect_error());
                }
                $sql = "SELECT * FROM registration WHERE email='$log_in'";
                $result=mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);                
                echo "<b><h2>".$row["name"]."</h2></b><br>";
                echo "Email: ".$row["email"]."<br>";
                echo "DOB: ".$row["dob"]."<br>";
                echo "Password: ".$row["password"]."<br>";
                ?>
                <div class="flex gap-5 pr-10 mt-10">
                    <a href="edit.php">
                        <svg class="w-10 h-10" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 21L12 21H21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12.2218 5.82839L15.0503 2.99996L20 7.94971L17.1716 10.7781M12.2218 5.82839L6.61522 11.435C6.42769 11.6225 6.32233 11.8769 6.32233 12.1421L6.32233 16.6776L10.8579 16.6776C11.1231 16.6776 11.3774 16.5723 11.565 16.3847L17.1716 10.7781M12.2218 5.82839L17.1716 10.7781"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
        
                    <a href="delete.php">
                        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"></path>
                        </svg>
                    </a>
                </div>
        
            </li>
            <?php
                $conn = mysqli_connect('localhost', 'param', '161607', 'user');
                if (!$conn) {
                    die('Could not connect: ' . mysqli_connect_error());
                }   
                $sql = "SELECT * FROM registration";
                $result = mysqli_query($conn, $sql);
                               
            ?>
            <?php foreach ($row as $key => $value): ?>
                
                <?php if (mysqli_num_rows($result) > 0):?>
                        <?php while($row = mysqli_fetch_assoc($result)):?>
                         <li class="bg-white rounded-md px-5 py-10 text-lg w-[30rem]">
                          <?php echo "<br><b> <h2>" . $row["name"]. "</h2></b><br> email: " . $row["email"]. "<br>DOB " . $row["dob"]. "<br>";?>
                          </li>
                          <?php endwhile; ?>
                      <?php else:?>
                        echo "0 results";
                <?php endif; ?>
                
            <?php endforeach; ?>
        </ul>
    </main>
</body>
</html>