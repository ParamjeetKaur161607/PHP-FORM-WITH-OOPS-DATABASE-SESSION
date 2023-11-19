<?php
// session_start();
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
        <section class="text-center p-28 space-y-10 flex flex-col items-center justify-center">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                class="bg-gray-200 flex flex-col w-[40rem] gap-5 p-10 rounded-lg" autocomplete="off"
                enctype="multipart/form-data">
                <input type="password" name="old" id="old" aria-label="Password" placeholder="old"
                    class="p-5 rounded-lg" value="">
                <span>
                    <?php echo $user_object->passworderr; ?>
                </span>
                <button type="submit" name="delete"
                    class="p-5 rounded-lg bg-gray-300 hover:bg-green-300 hover:text-white">Delete</button>

            </form>
        </section>
    </main>
</body>

</html>