
<?php
include "db.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['age']) && isset($_POST['phone'])  && isset($_POST['gender']) && isset($_POST['date']) && isset($_POST['city']) && isset($_POST['message'])) 
{

    function validate($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $age = validate($_POST['age']);
    $phone = validate($_POST['phone']);
    $gender = validate($_POST['gender']);
    $date = validate($_POST['date']);
    $city = validate($_POST['city']);
    $message = validate($_POST['message']);
    

    
        
        $sql = "INSERT INTO query (`name`,`age`, `phone`,`gender`,`date`,`city`,`message`) VALUES ('$name','$age', '$phone', '$gender', '$date', '$city', '$message')";
        $result=$conn->query($sql);
                if($result == TRUE)
         {
        
            header("Location: contactus.php?success= successfully submitted");
            exit();
        }
        else {
            header("Location: contactus.php?error=Failed to submit");
            exit();
        }
    }

?>