<?php

    // check if id is set
    if(isset($_POST['id'])) {

        // delete product from products table
        $conn = mysqli_connect('localhost', 'user', 'user', 'warehouse');
        if($conn) {
            $id_to_delete = mysqli_real_escape_string($conn, $_POST['id']);
            $sql = "DELETE FROM products WHERE id = $id_to_delete";
            if(mysqli_query($conn, $sql)) {
                echo 1;
            } else {
                echo 'Query error: ' . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }

?>