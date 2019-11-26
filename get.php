<?php

    if(isset($_POST['get'])) {
        $get = trim($_POST['get']);
        if($get == 'all') {
            $conn = mysqli_connect('localhost', 'user', 'user', 'warehouse');

            if($conn) {
                $sql = "SELECT * FROM products";

                $result = mysqli_query($conn, $sql);

                if($result) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    $productsJSON = json_encode($products);
    
                    echo $productsJSON;

                    mysqli_free_result($result);
                } else {
                    echo 'Query error: ' . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
        } else if(preg_match("/^[0-9]+$/", $get)) {
            $id = trim($_POST['get']);
            $conn = mysqli_connect('localhost', 'user', 'user', 'warehouse');

            if($conn) {
                $sql = "SELECT * FROM products WHERE id='$id'";

                $result = mysqli_query($conn, $sql);

                if($result) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    $productsJSON = json_encode($products);

                    echo $productsJSON;

                    mysqli_free_result($result);
                } else {
                    echo 'Query error: ' . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
        } else {
            echo 'Query error: ';
        }
    }

?>