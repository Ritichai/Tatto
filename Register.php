<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">กรอกข้อมูลสมาชิก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_GET['submit'])) {
                    $member_username = $_GET['member_username'];
                    $member_password = $_GET['member_password'];
                    $ttl_id = $_GET['ttl_id'];
                    $member_fname = $_GET['member_fname'];
                    $member_lname = $_GET['member_lname'];
                    $member_email = $_GET['member_email'];
                    $member_tel = $_GET['member_tel'];
                    $member_status = $_GET['member_status'];
                    include './connent.php';
                    $check = "SELECT * FROM member WHERE member_username='$member_username'";
                    $recheck = mysqli_query($conn, $check);
                    $num = mysqli_fetch_array($recheck);
                    if ($num != 0) {
                        echo "<script>";
                        echo"alert('ชื่อผู้ใช้มีอยู่ในระบบแล้ว');";
                        echo"window.location = 'index.php';";
                        echo"</script>";
                    } else {
                        $sql = "insert into member";
                        $sql .= " values (null,'$member_username','$member_password',"
                                . "'$ttl_id','$member_fname','$member_lname',"
                                . "'$member_email','$member_tel','member')";
                        include './connent.php';
                        mysqli_query($conn, $sql);
                        mysqli_close($conn);
                    }
                    if ($sql == true) {

                        echo "<script>";
                        echo"alert('สมัครสมาชิคเรียบร้อยเเล้ว');";
                        echo"window.location = 'index.php';";
                        echo"</script>";
                    } else {
                        echo '' . mysql_error();
                    }
                } else {
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return(validate());">
                        <div class="form-group">                                    
                            <input id="member_username" type="text" class="form-control" name="member_username" placeholder="ชื่อผู้ใช้">
                        </div>
                        <div class="form-group">                                 
                            <input id="member_password" type="password" class="form-control" name="member_password" placeholder="รหัสผ่าน" required="">
                        </div>                               
                        <div class="form-group">                                 
                            <div class="form-inline">

                                <select class="form-control col-3" id="ttl_id" name="ttl_id">
                                    <?php
                                    include 'connent.php';
                                    $sql = 'SELECT * FROM ttl_anme';
                                    $result = mysqli_query($conn, $sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_id'] . '">';
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                    ?>
                                </select> 
                                <input id="member_fname" type="text" class="form-control col" name="member_fname" placeholder="ชื่อ" required="">
                                <input id="member_lname" type="text" class="form-control col" name="member_lname" placeholder="สกุล" required="">
                            </div>
                        </div>                            

                        <div class="form-group">                                
                            <input id="member_email" type="email" class="form-control" name="member_email" placeholder="อีเมล">
                        </div>
                        <div class="form-group">                                
                            <input id="member_tel" type="text" class="form-control" name="member_tel" placeholder="เบอร์โทรศัพท์">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="ตกลง" class="btn btn-primary col-12">

                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

