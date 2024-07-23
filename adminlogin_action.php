<?php
include "db.php";

if (isset($_POST['aname']) && isset($_POST['apassword'])) {

function validate($data){

$data = trim($data);

$data = stripslashes($data);

$data = htmlspecialchars($data);

return $data;

}

$aname = validate($_POST['aname']);

$apassword = validate($_POST['apassword']);

if (empty($aname)) {

header("Location: adminlogin_action.php?error=User Name is required");

exit();

}else if(empty($apassword)){

header("Location: adminlogin_action.php?error=Password is required");

exit();

}
else{
    $sql = "SELECT * FROM admin WHERE aname='$aname' AND apassword='$apassword'";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) === 1) {
    
    $row = mysqli_fetch_assoc($result);
    
    if ($row['aname'] === $aname && $row['apassword'] === $apassword) {
    
    echo "Logged in!";
    
    $_SESSION['aname'] = $row['aname'];
    
    $_SESSION['aid'] = $row['aid'];
    
    header("Location: selectaction.php");
    
    exit();
    
    }else{
    
    header("Location: adminlogin.php?error=Incorect User name or password");
    
    exit();
    
    }
    
    }else{
    
    header("Location: adminlogin.php?error=Incorect User name or password");
    
    exit();
    
    }
    
    }
    
    }else{
    
    header("Location: adminlogin.php");
    
    exit();
    
    }?>