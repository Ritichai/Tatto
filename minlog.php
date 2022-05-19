        <?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>กกก</title>
    </head>
    <body>


        <?php echo "ยินดีต้อนรับ" .$_SESSION['member_id'];?>
        <a href="out.php">ออก</a>
    </body>
</html>
