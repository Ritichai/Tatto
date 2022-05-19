<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.css">
<?php

include '../connent.php';
include '../css/css.php';

$member_username = mysqli_escape_string($conn, $_POST['member_username']);
$member_password = mysqli_escape_string($conn, $_POST['member_password']);





$sql ="SELECT * FROM member WHERE member_username=? AND  member_password=? AND member_status='admin' ";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt,"ss",$member_username,$member_password);
mysqli_execute($stmt);
$result_user = mysqli_stmt_get_result($stmt);
if($result_user->num_rows ==1){
    session_start();
    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    $_SESSION['member_idad']=$row_user['member_id'];
    $_SESSION['member_fnamead']=$row_user['member_fname'];
    $_SESSION['member_lnamead']=$row_user['member_lname'];
    
    
   
    
    
     echo "<meta http-equiv='refresh' content='2; URL=indexadmin.php'>";
     echo '<div class="alert alert-success">'.'เข้าสู่ระบบโดย '.$_SESSION['member_fnamead'].' '.$_SESSION['member_lnamead'].'</div>';
} else {
     
    
    echo '<div class="alert alert-danger">ข้อมูลผู้ใช้หรือรหัสผ่านผิดกรุณาตรวจสอบอีกครั้ง</div>';
    echo "<meta http-equiv='refresh' content='2; URL=loginadmin.php'>";
}
?>