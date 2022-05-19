<!doctype html>
<html lang="en">
    <head>
        <title>TT</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <!-- Animate CSS-->
        <link rel="stylesheet" href="css/animate.css">
        <!-- fontawesome CDN -->
        <script src="https://use.fontawesome.com/bd5349c1d5.js"></script>    
    </head>
    <body>
      
        <div class="row">
            <div class="col-12">
                <div class="fixed-top"><?php include './Navbar/Navbar.php'; ?></div>
            </div>
            <div class="col-12">
                <div class="co1" id="home"><?php include './Carousel/carousel.php'; ?></div>
            </div>
            <div class="col-12">
                <div style="background-color: white">
                    <div class="wow slideInDown"><h1 style="margin-top: 50px; text-align: center;"><b>ราคาโดยประมาณ</b></h1><br></div>
                    <?php include './price.php'; ?>
                </div>
            </div>
            <div class="col-12">
                <div style="background-color: white;  margin: 0px 0px 0px 0px;"><br>
                    <div class="wow slideInDown"><h1 style="margin-top: 0px; text-align: center;"><b style="font-family: fantasy">Portfolio</b></h1><br></div>
                        <?php include './portfolio.php'; ?>
                </div>
            </div>
        </div>
        <?php include './Register.php'; ?>
        <?php include './css/css.php'; ?>
        <?php include './Book.php'; ?>
        <?php include './Book_view.php';?>
        
    </body>
</html>