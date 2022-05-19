<!doctype html>
<html lang="en">
    <head>
        <title>TT</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="css/animate.css">
        <script src="https://use.fontawesome.com/bd5349c1d5.js"></script>    
    </head>
    <body>

        <div class="jumbotron">
            <h3 class="display-4">ระบบจัดคิวการสักร้าน <b>TT</b> </h3>

            <div class="row">
                <div class="col">
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="../img/pic_05.png"   alt="Responsive image" style="height: 430px;">  
                                    
                                </div>
                                <div class="col">
                                    <form action="../adminCon/check_login_admin.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="member_username" id="member_username"> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">รหัสผ่าน</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="member_password" id="member_password">
                                </div>
                                <button type="submit" class="btn btn-primary fa fa-sign-in"> เข้าสู่ระบบ</button>
                            </form>
                                </div>
                                <div class="col">
                                    <a>  </a>
                                </div>
                            </div>                            
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../css/css.php'; ?>

    </body>
</html>