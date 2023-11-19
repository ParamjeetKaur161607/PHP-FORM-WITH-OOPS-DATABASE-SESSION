<?php
session_start();
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
        <ul class="p-20 rounded-md grid grid-cols-3 gap-10">
            <li class="bg-green-100 rounded-md px-5 py-10 text-lg w-[30rem]">                
                <?php                
                echo "<b>";
                echo $_SESSION['login'];
                $log_in = $_SESSION['login'];
                echo "</b>";
                $conn = mysqli_connect('localhost', 'param', '161607', 'user');
                if (!$conn) {
                    die('Could not connect: ' . mysqli_connect_error());
                }
                $sql = "SELECT * FROM registration r LEFT JOIN file_task f ON r.email = f.email WHERE r.email='$log_in'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "<div class='flex justify-between items-center'>";
                echo "<b class='text-xl'>ID: " . $row["id"] . "</b><br>";        
                echo '<img src="IMAGES/' . $row["image_name"] . '" alt="uploaded Image" class="h-20 w-20 rounded rounded-full border">';
                echo "</div>";
                echo "<b class='text-xl'>" . $row["name"] . "</b><br>";                
                echo "Email: " . $row["email"] . "<br>";
                echo "DOB: " . $row["dob"] . "<br>";
                echo "Password: " . $row["password"] . "<br>";
                echo "Uploaded Date: " . $row["uploaded_date"] . "<br>";
                echo "Modified Date: " . $row["modified_date"] . "<br>";
                

                // echo "<pre>";
                // var_dump($row);
                // echo "</pre>"; 
                          
                ?>
                <!-- <img src="' . $imagePath . '" alt="login user"> -->
                <div class="flex gap-5 pr-10 mt-10">
                    <a href="edit.php">
                        <svg class="w-5 h-5" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 21L12 21H21" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                            </path>
                            <path
                                d="M12.2218 5.82839L15.0503 2.99996L20 7.94971L17.1716 10.7781M12.2218 5.82839L6.61522 11.435C6.42769 11.6225 6.32233 11.8769 6.32233 12.1421L6.32233 16.6776L10.8579 16.6776C11.1231 16.6776 11.3774 16.5723 11.565 16.3847L17.1716 10.7781M12.2218 5.82839L17.1716 10.7781"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>

                    <a href="delete.php">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z">
                            </path>
                        </svg>
                    </a>
                </div>

            </li>
            <?php
            $conn = mysqli_connect('localhost', 'param', '161607', 'user');
            if (!$conn) {
                die('Could not connect: ' . mysqli_connect_error());
            }
            $sql1 = "SELECT * FROM registration LEFT JOIN file_task ON registration.email = file_task.email ORDER BY id";

            $result1 = mysqli_query($conn, $sql1);

            ?>
            <?php foreach ($row as $key => $value): ?>

                <?php if (mysqli_num_rows($result1) > 0): ?>
                    <?php while ($row1 = mysqli_fetch_assoc($result1)): ?>
                        <?php if($row1["id"]==$row["id"])
                            {
                                continue;
                            } ?>
                        <li class="bg-white rounded-md px-5 py-10 text-lg w-[30rem]">
                            <?php                            
                            echo "<div class='flex justify-between items-center'>";
                            echo "<b>ID: " . $row1["id"] . "</b><br>";                
                            echo '<img src="IMAGES/' . $row1["image_name"] . '" alt="uploaded Image" class="h-20 w-20 rounded rounded-full border">';
                            echo "</div>";
                            echo "<b><h2>" . $row1["name"] . "</h2></b><br>";
                            echo "Email: " . $row1["email"] . "<br>";
                            echo "DOB: " . $row1["dob"] . "<br>";                           
                            echo "Uploaded Date: " . $row1["uploaded_date"] . "<br>";
                            echo "Modified Date: " . $row1["modified_date"] . "<br>";                          
                            
                            ?>
                        </li>
                    <?php endwhile; ?>
                <?php else: ?>
                    echo "0 results";
                <?php endif; ?>

            <?php endforeach; ?>
        </ul>
    </main>
</body>

</html>