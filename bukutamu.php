<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <!-- Latest compiled and minified CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style media="screen">
      .form-signin
        {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
        }
      .form-signin .form-signin-heading, .form-signin .checkbox
        {
        margin-bottom: 10px;
        }
      .form-signin .checkbox
        {
        font-weight: normal;
        }
      .form-signin .form-control
        {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        }
      .form-signin .form-control:focus
        z-index: 2;
        {
        }
      .form-signin input[type="text"]
        {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        }
      .form-signin input[type="password"]
        {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
      .account-wall
        {
        margin-top: 20px;
        padding: 40px 0px 20px 0px;
        background-color: #f7f7f7;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
      .login-title
        {
        color: #555;
        font-size: 18px;
        font-weight: 400;
        display: block;
        }
      .profile-img
        {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        }
      .need-help
        {
        margin-top: 10px;
        }
      .new-account
        {
        display: block;
        margin-top: 10px;
        }

      .fa-heart 
        {
        color: rgba(249, 50, 50, 0.87);
        }

       .footer 
        {
        position:absolute;
        bottom:0;
        width:100%;
        height:60px;   /* tinggi dari footer */
        background: rgba(0, 0, 0, 1);
        }
    </style>
  </head>
  <body>
    <!-- nav tabs -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="logo-asik" width="120px" />
            <!-- <span class="glyphicon glyphicon-star"></span>&nbsp;ASIK&nbsp;<span class="glyphicon glyphicon-star"></span> -->
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Beranda</a></li>
            <li><a href="bukutamu.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Buku Tamu</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav><!-- /.end-nav -->


    <!-- form bukutamu -->
    <div class="container">
      <div style="position:center">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
              <h1 class="text-center login-title">Form Buku Tamu</h1>
              <img class="profile-img" src="http://maestroac.esy.es/images/buku_tamu.png_480_480_0_64000_0_1_0.png" alt="img-login" />
              <!-- Form Buku Tamu -->
              <form class="form-signin" method="post" action="prosesbukutamu.php">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Ketik nama anda" required>
                  <input type="email" name="email" class="form-control" placeholder="Ketik email anda" required>
                  <input type="text" name="judul" class="form-control" placeholder="judul pesan" required>
                  <textarea class="form-control" placeholder="Masukkan pesan anda" name="pesan" id="comment" rows="5"></textarea><br>
                  <button type="submit" class="btn btn-lg btn-primary btn-block" name="btn-kirim"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;KIRIM</button>
                </div>
                <p class="text-center text-danger"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Kritik dan saran anda sangat membantu</p>
              </form>
            </div><!-- End account-wall -->
          </div><!-- End col -->
        </div><!-- End Row -->
      </div><!-- End alert -->
    </div><!-- End Container -->
    <br><br>

    <?php include "template/footer.php"; ?>