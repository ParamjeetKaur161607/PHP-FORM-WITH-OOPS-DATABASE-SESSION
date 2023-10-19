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
        <ul class="p-20 rounded-md">
            <li class="bg-white rounded-md px-5 py-10 text-lg font-bold">                
                <?php
                echo $_SESSION['login'];  
                foreach ($_SESSION['user'][''] as $key => $value) {
                    # code...
                }              
                ?>
            </li>
        </ul>
    </main>
</body>
</html>