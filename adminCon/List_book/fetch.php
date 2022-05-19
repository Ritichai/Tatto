<?php
include '../../connent.php';
if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM book_tattoos WHERE id_member = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
?>