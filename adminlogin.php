<!DOCTYPE html>

<html>

<head>

<title>Admin LOGIN</title>

<link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>

<form action="adminlogin_action.php" method="post">

<h2>Admin Login</h2>

<?php if (isset($_GET['error'])) { ?>

<p class="error">
    <?php echo $_GET['error']; ?>
</p>

<?php } ?>

<label>Admin Name</label>

<input type="text" name="aname" placeholder="Admin Name"><br>

<label>Password</label>

<input type="password" name="apassword" placeholder="Password"><br>

<button type="submit">Login</button>

</form>

</body>

</html>