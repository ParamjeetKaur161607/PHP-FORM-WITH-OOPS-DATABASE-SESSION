<?php
include 'compare.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300">
    <main>
        <section class="text-center p-28 space-y-20 flex flex-col items-center justify-center">
            <header>
                <h1 class="font-bold text-5xl border-b pb-8 border-gray-500">Login Form</h1>
            </header>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="bg-gray-200 flex flex-col w-[40rem] gap-10 p-10 rounded-lg">                      
                <input type="email" name="email-login" required id="email-login" aria-label="email" placeholder="Email" class="p-5 rounded-lg" value="">
                

                <input type="password" name="password-login" required id="password-login" aria-label="Password" placeholder="Password" class="p-5 rounded-lg" value="">
                <span><?php echo $comapre_object->pass; ?></span>

                <button type="submit" name="login" class="p-5 rounded-lg bg-gray-300 hover:bg-green-300 hover:text-white">Login</button> 
            </form>

            <?php
            
            ?>
        </section>
    </main>
</body>
</html>