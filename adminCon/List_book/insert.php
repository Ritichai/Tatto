<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "tattoo");
if (!empty($_POST)) {
    $output = '';
    $message = '';
    $book_tattoo_date = mysqli_real_escape_string($connect, $_POST["book_tattoo_date"]);
    $book_tattoo_size = mysqli_real_escape_string($connect, $_POST["book_tattoo_size"]);
    $book_tattoo_color = mysqli_real_escape_string($connect, $_POST["book_tattoo_color"]);
    $book_tattoo_status = mysqli_real_escape_string($connect, $_POST["book_tattoo_status"]);
    $book_admin_set_time = mysqli_real_escape_string($connect, $_POST["book_admin_set_time"]);
    
    
    if ($_POST["employee_id"] != '') {
        
        $query=" UPDATE book_tattoos SET book_tattoo_date = '$book_tattoo_date',book_tattoo_size='$book_tattoo_size',"
                . "book_tattoo_color='$book_tattoo_color',book_tattoo_status='$book_tattoo_status',"
                . "book_admin_set_time='$book_admin_set_time' WHERE id_member='".$_POST["employee_id"]."'";
        
                $message = '<div class="alert alert-success">บันทึกข้อมูลสำเร็จ</div>';
        
        
    } 
    else {
        
        $query = "insert into book_tattoos";
    $query .= " values ('{$_SESSION['member_id']}','$book_tattoo_date','$book_tattoo_size','$book_tattoo_color','1','$book_admin_set_time')";
        
    }
    
    
    
    
    if (mysqli_query($connect, $query)) {
       
       echo '<div class="alert alert-success">ลงวันนัดสำเร็จ</div>';
        echo "<meta http-equiv='refresh' content='2; URL=indexadmin.php'>";
    }
       
    }
    

?>
