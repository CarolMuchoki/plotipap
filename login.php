<?php include('include/user.php') ?>

<?php include ('include/header.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Login to Plotipap Investment</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

  <link href="css/bootstrap.min.css" rel="stylesheet">
 
  <link href="css/mdb.min.css" rel="stylesheet">
 
  <link href="css/style.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
  <div class="header">
    <h2>Login</h2>
  </div>
   
  <form method="post" action="login.php">
    <?php include('include/error.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="signup.php">Sign up</a>
    </p>
  </form>
</body>
</html>