<?php
include "db.php";

if (isset($_POST['uname']) && isset($_POST['upassword'])) {

function validate($data){

$data = trim($data);

$data = stripslashes($data);

$data = htmlspecialchars($data);

return $data;

}

$uname = validate($_POST['uname']);

$upassword = validate($_POST['upassword']);

if (empty($uname)) {

header("Location: login.php?error=User Name is required");

exit();

}else if(empty($upassword)){

header("Location: login.php?error=Password is required");

exit();

}else{$sql = "SELECT * FROM users WHERE uname='$uname' AND upassword='$upassword'";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) === 1) {
    
    $row = mysqli_fetch_assoc($result);
    
    if ($row['uname'] === $uname && $row['upassword'] === $upassword) {
    
    echo "Logged in!";
    
    $_SESSION['uname'] = $row['uname'];
    
    $_SESSION['id'] = $row['id'];
    
    header("Location: cart.php");
    
    exit();
    
    }else{
    
    header("Location: login.php?error=Incorect User name or password");
    
    exit();
    
    }
    
    }else{
    
    header("Location: login.php?error=Incorect User name or password");
    
    exit();
    
    }
    
    }
    
    }else{
    
    header("Location: login.php");
    
    exit();
    
    }?>