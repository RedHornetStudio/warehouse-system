<?php

    if(isset($_POST['get'])) {
        if($_POST['get'] == 'all') {
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
        } else if(ctype_digit($_POST['get'])) {
            $id = $_POST['get'];

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
            echo 'Wrong request';
        }
    }

?>