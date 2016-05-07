<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Login Admin</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
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
    </style>
  </head>
  <body background="http://www.iluvmagpie.com/themes/magpie/images/backgrounds/background.jpg">
    <!-- form login -->
    <div class="container">
      <div style="position:center">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
              <h1 class="text-center login-title">Login untuk mengelola Website</h1>
              <img class="profile-img" src="http://xaonon.dyndns.org/logos/misc/anon_seal_small.png" alt="img-login" />
              <!-- Form Login Admin -->
              <form class="form-signin" method="post" action="login.php">
                <input type="text" name="name" class="form-control" placeholder="username" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="password" required>
                <select class="form-control" name="leveljenjang">
                  <option value="">-- level --</option>
                  <option value="administrator">Administrator</option>
                  <option value="adminsmp">SMP</option>
                  <option value="adminsma">SMA</option>
                </select>
                <button type="submit" class="btn btn-lg btn-primary btn-block" name="btn-login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;LOGIN</button>
              </form>
            </div><!-- End account-wall -->
          </div><!-- End col -->
        </div><!-- End Row -->
      </div><!-- End alert -->
    </div><!-- End Container -->

    <?php include '../template/footer.php'; ?>
