<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Webslesson Tutorial | Bootstrap Modal with Dynamic MySQL Data using Ajax & PHP</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    </head>
    <body>
        <h1>รายการ การจองสัก</h1>
<!--        <button type="button" data-toggle="modal" data-target="#book" class="btn btn-warning">Add</button>-->

        <table class="table table-striped table-responsive" id="employee_table">
            <thead>
                <tr>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">ขนาดลายสัก</th>
                    <th scope="col">สีลายสัก</th>
                    <th scope="col">เบอรโทรติดต่อ</th>
                    <th scope="col">วันที่เลือกมา</th>
                    <th scope="col">วันเวลาที่นัด</th>
                    <th scope="col">สถานะการสัก</th>
                    <th scope="col">ลงวันนัด</th>
                    <th scope="col">ลบรายการสัก</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../connent.php';
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
                              order by book_tattoos.book_admin_set_time asc ';
                                
                $result = mysqli_query($conn, $sql);
                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {

                    echo '<tr>';
                    echo '<td>' . $row['member_fname'] . ' ' . $row['member_lname'] . '</td>';
                    echo '<td>' . $row['tattoo_size_name'] . '</td>';
                    echo '<td>' . $row['tattoo_color_name'] . '</td>';
                    echo '<td>' . $row['member_tel'] . '</td>';
                    echo '<td>' . $row['book_tattoo_date'].'</td>';
                    echo '<td>' . $row['book_admin_set_time'] . '</td>';
                    echo '<td>' . $row['book_tattoo_status'] . '</td>';
                    ?>           

                <td><a href="#" class="btn btn-primary btn-sm fa fa-calendar-check-o col edit_data"id="<?php echo $row["id_member"]; ?>" name="edit"></a></td>
                <td><a href="List_book/bookdel.php?id_member=<?php echo $row["id_member"]; ?>" class="btn btn-danger btn-sm fa fa-trash"></a></td>
                 
                <?php
                echo '</td>';
            }
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>


<div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ลงวันนัด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                
                <form method="post" id="insert_form">
                  
                    <div class="form-group">                                    
                        <input id="book_tattoo_date" type="date" class="form-control" name="book_tattoo_date" readonly>
                    </div>
                    <div class="form-group">   
<!--                        <label for="book">ขนาดของลายสัก</label>-->
                        <input type="hidden"class="form-control" id="book_tattoo_size" name="book_tattoo_size" readonly>                             
                    </div>                               
                    <div class="form-group">  
<!--                        <label for="book">สีลอยสัก</label>-->
                        <input type="hidden" class="form-control" id="book_tattoo_color" name="book_tattoo_color" readonly>                                                  
                    </div>
                    <div class="form-group">   
                        <label for="book">สถานะการสัก</label>
                        <select class="form-control"  id="book_tattoo_status" name="book_tattoo_status" style="height: 35px;"   > 
                            <option value="1">รอการสัก</option>
                            <option value="2">ได้รับการสักแล้ว</option>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <label for="book">เลือกวันนัด</label>
                        <input id="book_admin_set_time" type="date" class="form-control" name="book_admin_set_time">
                    </div>
                    <div class="form-group">
                        <label for="book">รหัสลูกค้า</label>
                        <input id="employee_id" type="text" class="form-control" name="employee_id" readonly>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="insert"  id="insert" value="ตกลง" class="btn btn-primary col-12">                            
                    </div>                    
                </form>                        
            </div>           
        </div>
    </div>
</div>


<?php include 'bookedit.php'; ?>
<script>
    $(document).ready(function () {
        $('.view_data').click(function () {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "List_book/select.php",
                method: "post",
                data: {employee_id: employee_id},
                success: function (data) {
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });


        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
            if ($('#book_tattoo_size').val() == "")
            {
                alert("กรุณากรอกขนาดลายสัก");
            }            
            else if ($('#book_tattoo_color').val() == '')
            {
                alert("กรุณากรอกสีลายสัก");
            }
            else
            {
                $.ajax({
                    url: "List_book/insert.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function () {
                        $('#insert').val("Inserting");
                    },
                    success: function (data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                    }
                });
            }
        });


        $('.edit_data').click(function () {
            var employee_id = $(this).attr("id");
            $.ajax({

                url: "List_book/fetch.php",
                method: "post",
                data: {employee_id: employee_id},
                dataType: "json",
                success: function (data) {
                    $('#book_tattoo_date').val(data.book_tattoo_date);
                    $('#book_tattoo_size').val(data.book_tattoo_size);
                    $('#book_tattoo_color').val(data.book_tattoo_color);
                    $('#book_admin_set_time').val(data.book_admin_set_time);
                    $('#employee_id').val(data.id_member);                    
                    $('#insert').val("ลงวันนัด");
                    $('#book').modal('show');
                }

            });
        });



    });
</script>
