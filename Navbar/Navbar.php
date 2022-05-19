<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="img/winged-heart.png"  width="30" height="30"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php
    if (!isset($_SESSION['member_id'])) {

        echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
        echo '<ul class="navbar-nav mr-auto">';
        echo '</ul>';
        echo '<form class="form-inline my-2 my-lg-0" action="./check_login.php" method="post">';
        echo '<input input class="form-control" type="text" placeholder="ชื่อผู้ใช้" aria-label="username" name="member_username" id="member_username">';
        echo '<input class="form-control" type="password" placeholder="รหัสผ่าน" aria-label="password" name="member_password" id="member_password">';
        echo '<input type="submit" value="เข้าสู่ระบบ"class="btn btn-outline-success">';
        echo '<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary">' . 'สมัครสมาชิก' . '</button>';
        echo '</form>';
        echo '</div>';
    } else {

        echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
        echo'<ul class="navbar-nav mr-auto">';
        echo'</ul>';
        echo'<form class="form-inline my-2 my-lg-0">';
        echo '<ul class="navbar-nav mr-auto">';
        echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo '<div class="fa fa-user-o">' . '&nbsp;&nbsp;' . $_SESSION['member_fname'] . '&nbsp;' . $_SESSION['member_lname'] . '</div>';
        echo '</a>';
        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        echo '<a class="dropdown-item" href="./out.php">' . 'ออกจากระบบ' . '</a>';
        echo '</div>';
        echo'</li>';
        echo'</ul>';

        echo'<button type="button" data-toggle="modal" data-target="#book" class="btn btn-outline-primary btn btn-sm fa fa-calendar-check-o">' . 'จองคิวสัก' . '</button>';
        echo'<button type="button" data-toggle="modal" data-target="#bookview" class="btn btn-outline-success btn btn-sm fa fa-calendar-check-o">' . 'ดูคิวสัก' . '</button>';
        echo'</form>';
        echo'</div>';
    }
    ?>




</nav>



