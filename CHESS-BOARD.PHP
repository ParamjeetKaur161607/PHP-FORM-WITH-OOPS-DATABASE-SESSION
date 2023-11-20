<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <table>
    <?php 
    $value=0;
        for($column=0;$column<=8;$column++){
            
            echo "<tr>";
            $value=$column;
            for($row=0;$row<=8;$row++){
               if($value%2==0){
                echo "<td height=100px width=100px bgcolor=black></td>";
                $value++;
               }else{
                echo "<td height=100px width=100px bgcolor=white></td>";
                $value++;
               }
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>