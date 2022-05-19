<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.css">
<?php

include './connent.php';
include './css/css.php';

$member_username = mysqli_escape_string($conn, $_POST['member_username']);
$member_password = mysqli_escape_string($conn, $_POST['member_password']);


 

$sql ="SELECT * FROM member WHERE member_username=? AND  member_password=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt,"ss",$member_username,$member_password);
mysqli_execute($stmt);
$result_user = mysqli_stmt_get_result($stmt);
if($result_user->num_rows ==1){
    session_start();
    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    $_SESSION['member_id']=$row_user['member_id'];
    $_SESSION['member_fname']=$row_user['member_fname'];
    $_SESSION['member_lname']=$row_user['member_lname'];
    
     echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
     echo '<div class="alert alert-success">'.'เข้าสู่ระบบโดย '.$_SESSION['member_fname'].' '.$_SESSION['member_lname'].'</div>';
} else {
     
    echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
    echo '<div class="alert alert-danger">ข้อมูลผู้ใช้หรือรหัสผ่านผิดกรุณาตรวจสอบอีกครั้ง</div>';
}
?>