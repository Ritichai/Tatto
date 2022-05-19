<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.css">
    </head>
    <body>
        <?php
        include '../../connent.php';
        $id_member = $_GET['id_member'];
        $sql = " delete from book_tattoos where id_member ='$id_member'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<div class="alert alert-success">ลบสำเร็จ</div>';
            echo "<meta http-equiv='refresh' content='2;URL=../indexadmin.php'>";
            
        } else {
            echo '<div class="alert alert-success">ลบสำเร็จ</div>';
            echo "<meta http-equiv='refresh' content='2; URL=../indexadmin.php'>";
            
        }
        mysqli_close($conn);
        ?>
        <br>
    </body>
</html>