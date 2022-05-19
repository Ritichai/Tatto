<?php
session_start();
if (!isset($_SESSION['member_idad'])) {
    header("location:loginadmin.php");
}
?>




<div class="card border-dark mb-3" style="max-width: 20rem;">
    <div class="card-header"><?php echo 'คุณ :' . ' ' . $_SESSION['member_fnamead'] . ' ' . $_SESSION['member_lnamead'] ?></div>
    <div class="card-body text-dark">
        <h4 class="card-title">Dashboard</h4>

        <h5>
            <?php {
                include '../connent.php';
                $query = "SELECT COUNT(*) AS user_num FROM member";
                $result = mysqli_query($conn, $query); // Result resource
                $row = mysqli_fetch_array($result); // Use something like this to get the result
                ?>
                <span class="badge badge-primary col">จำนวนสมาชิกของร้าน <span class="badge badge-light"><?php echo $row['user_num']; ?></span></span>
            <?php } ?>
        </h5>
        
        <h5>
            <?php {
                include '../connent.php';
                $query_book = "SELECT COUNT(*) AS book_num FROM book_tattoos";
                $result_book = mysqli_query($conn, $query_book); // Result resource
                $row_book = mysqli_fetch_array($result_book); // Use something like this to get the result
                ?>
                <span class="badge badge-primary col">จำนวนผู้รอการสัก <span class="badge badge-light"><?php echo $row_book['book_num']; ?></span></span>
            <?php } ?>
        </h5>


    </div>
    <div class="card-footer bg-transparent border-dark">
        <a href="out.php" class="btn btn-danger col">ออกจากระบบ</a>
    </div>
</div>

