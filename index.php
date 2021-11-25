<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Secure Coding</title>
  </head>
  <body>
  <div class="container py-2">
    <div class="jumbotron">
      <h1>Login</h1>
      <form  method="POST" action="index.php">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit">Login</button>
        </div>
      </form>
    </div>
  </div>
  <?php
    include "connection.php";
    session_start();

    if(isset($_POST['username']) && isset($_POST['password']))
    {
      $uname = $_POST['username'];
      $password = $_POST['password'];
      $pattern = '/(\')+/i';
      $replacement = ' ';
      $uname = preg_replace($pattern, $replacement, $uname);
      $query=mysqli_query($connection,"SELECT * FROM users WHERE username ='$uname' AND password ='$password'") or die("Query Unsuccessfull:".mysqli_error($connection));

      if($query_run)
      {
        echo "Login Successfull";
      }
      else{
        echo "Login failed";
      }

      $num_rows=mysqli_num_rows($query);
      $row=mysqli_fetch_array($query);

      if($num_rows > 0)
      {
        $_SESSION["id"]=$row['id'];
        header("Location: profile.php?id=".$_SESSION["id"]);
      }
    }
  ?>
<script>res.setHeader("Content-Security-Policy","Script-src https://code.jquery.com/jquery-3.2.1.slim.min.js https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");</script>
  </body>
</html>