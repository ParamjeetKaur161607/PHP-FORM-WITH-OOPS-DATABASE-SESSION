<?php
include 'validation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300">
    <main>
        <section class="text-center p-28 space-y-10 flex flex-col items-center justify-center">
            <header>
                <h1 class="font-bold text-5xl border-b pb-8 border-gray-500">Registration Form</h1>
            </header>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="bg-gray-200 flex flex-col w-[40rem] gap-5 p-10 rounded-lg" enctype="multipart/form-data">
                <input type="text" name="name" id="name" aria-label="name" placeholder="Name" class="p-5 rounded-lg" value="">
                <span class=" text-red-600">
                    <?php echo $val_object->nameerr;?>
                </span>

                <input type="email" name="email" id="email" aria-label="email" placeholder="Email" class="p-5 rounded-lg" value="">
                <span class=" text-red-600">
                    <?php echo $val_object->emailerr;?>
                </span>

                <input type="date" name="dob" id="dob" aria-label="DOB" placeholder="DOB" class="p-5 rounded-lg" value="">
                <span class=" text-red-600">
                    <?php echo $val_object->doberr;?>
                </span>

                <input type="password" name="password" id="password" aria-label="Password" placeholder="Password" class="p-5 rounded-lg" value="">
                <span class=" text-red-600">
                    <?php echo $val_object->passworderr;?>
                </span>

                <input type="file" name="photo" id="photo">
                <span class=" text-red-600">
                    <?php echo $val_object->fileerr; ?>
                </span>

                <button type="submit" name="submit" class="p-5 rounded-lg bg-gray-300 hover:bg-green-300 hover:text-white">Register</button>      
                
            </form>
        </section>
    </main>
</body>
</html>
