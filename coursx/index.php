<?php
 require "dbBroker.php";
 require "model/user.php";

 session_start();

 if(isset($_POST['username']) && isset($_POST['password'])) {
     $uname=$_POST['username'];
     $password=$_POST['password'];

    $rs = User::logInUser($uname, $password, $conn);


      if($rs->num_rows==1) {
          echo "You have successfully logged in!";
          $_SESSION['user_id'] = $rs->fetch_assoc()['id'];
          header('Location: home.php');
          exit();
      } else {
          //header('Location: index.php');
          echo '<script type="text/javascript">alert("You have entered incorrect password!"); 
                                                window.location.href = "http://localhost/coursx/";</script>';
          exit();
      }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon"  type="image/x-icon" href="img/monogram.png" />
    <title>CourceX</title>

</head>
<body>
    <div class="login-form">
        <div class="login-box">
            <div class="login-img">
                <img src="img/login-screen.png" alt="login image">
            </div>
            <div class="login-area">
                <form method="POST" action="#">
                    <div class="logo-login">
                        <img src="img/logo-black.png" alt="Logo" class="logo">
                    </div>
                    <div class="form-container">
                        <div class="input-with-icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" placeholder="Username" name="username" class="form-control"  required>
                        </div>
                        <div class="input-with-icon">
                             <i class="fa fa-key" aria-hidden="true"></i>
                            <input type="password" placeholder="Password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <p class="credits">created and designed by<a href="https://github.com/NemanjaPavlovic98">Nemanja Pavlović</a></p>
</body>
</html>