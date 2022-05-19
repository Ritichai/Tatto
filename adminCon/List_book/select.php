<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      include '../../connent.php';
                $sql = 'select 
                                      book_tattoos.id_member,
                                      member.member_fname,
                                      member.member_lname,
                                      member.member_tel,
                                      book_tattoos.book_tattoo_date,
                                      tattoo_size.tattoo_size_name,
                                      tattoo_color.tattoo_color_name,
                                      book_status.book_tattoo_status,
                                      book_tattoos.book_admin_set_time
                              FROM ((((book_tattoos 
                              INNER JOIN member on book_tattoos.id_member = member.member_id)
                              INNER JOIN tattoo_size on book_tattoos.book_tattoo_size = tattoo_size.tattoo_size_id)
                              INNER JOIN tattoo_color ON book_tattoos.book_tattoo_color = tattoo_color.tattoo_color_id)
                              INNER JOIN book_status ON book_tattoos.book_tattoo_status = book_status.book_tattoo_status_id)
                              WHERE id_member='.$_POST["employee_id"].'.';
                $result = mysqli_query($conn, $sql);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <h4>ลงวันนัดให้กับ '.$row["member_fname"].' '.$row["member_fname"].'</h4>
                <tr>  
                     <td width="30%"><label></label></td>  
                     <td width="70%">'.$row["id_member"].'</td>  
                </tr>           
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>