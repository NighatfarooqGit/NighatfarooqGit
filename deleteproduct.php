<?php

include "db.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {

        $sql = "DELETE FROM `menu` WHERE `mid`='$id'";
        $result = $conn->query($sql);

        if ($result == TRUE) {

            echo "Record deleted successfully.";

        } else {

            echo "Error: " . $sql . "<br>" . $conn->error;

        }

    } else {

        echo "<script>
                if (confirm('Are you sure you want to delete this record?')) {
                    window.location.href = 'deleteproduct.php?id=$id & confirm=yes';
                } else {
                    window.location.href = 'viewproducts.php';
                }
              </script>";

    }

}

?>
