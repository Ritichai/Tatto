<div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">กอรกข้อมูลการจอง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                      <?php
                if (isset($_GET['submit2'])) {
                    $id_member= $_SESSION['member_id'];
                    $book_tattoo_date = $_GET['book_tattoo_date'];
                    $book_tattoo_size = $_GET['book_tattoo_size'];
                    $book_tattoo_color = $_GET['book_tattoo_color'];                    
                    $book_tattoo_status = $_GET['book_tattoo_status'];
                    $book_admin_set_time=$_GET['book_admin_set_time'];
                   
                   
                    $sql = "insert into book_tattoos";
                    $sql .= " values ('{$_SESSION['member_id']}','$book_tattoo_date','$book_tattoo_size','$book_tattoo_color','1','รอวันนัด')";
                    include './connent.php';
                    
                    
                mysqli_query($conn, $sql);
                    mysqli_close($conn);
                       if ($sql == true) {
                    $message = '<div class="alert alert-success" role="alert">Success</div>';
                } else {
                    echo '' . mysql_error();
                }
                } else {
                    ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>">


                    <div class="form-group">                                    
                            <input id="book_tattoo_date" type="date" class="form-control" name="book_tattoo_date" placeholder="กรุณาเลือกวันที่ต้องการมา">
                        </div>
                        <div class="form-group">   
                            <label for="book">ขนาดของลายสัก</label>
                            <select class="form-control" id="book_tattoo_size" name="book_tattoo_size">
                                    <?php
                                    include 'connent.php';
                                    $sql = 'SELECT * FROM tattoo_size';
                                    $result = mysqli_query($conn, $sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['tattoo_size_id'] . '">';
                                        echo $row['tattoo_size_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                    ?>
                                </select> 
                            
                        </div>                               
                        <div class="form-group">                               
                             <select class="form-control" id="book_tattoo_color" name="book_tattoo_color">
                                    <?php
                                    include 'connent.php';
                                    $sql = 'SELECT * FROM tattoo_color';
                                    $result = mysqli_query($conn, $sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['tattoo_color_id'] . '">';
                                        echo $row['tattoo_color_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                    ?>
                                </select> 
                        </div>
                       <div class="form-group">                                    
                           <input id="book_tattoo_status" type="hidden" class="form-control" name="book_tattoo_status">
                        </div>
                    <div class="form-group">                                    
                        <input id="book_admin_set_time" type="hidden" class="form-control" name="book_admin_set_time">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit2" value="ตกลง" class="btn btn-primary col-12">                            
                        </div>
                    

                    </form>
                    <?php
                }
                ?>              
            </div>           
        </div>
    </div>
</div>

