<?php

    $title = '';
    $description = '';
    $price = '';
    $stock = '';

    $errors = ['title' => '', 'description' => '', 'price' => '', 'stock' => '',];

    // check if form is submitted
    if(isset($_POST['title'])) {

        // check for errors
        $title = trim($_POST['title']);
        if(empty($title)) {
            $errors['title'] = 'a title is required';
        } else {
            if(!preg_match("/^[a-zA-Z0-9\s]+$/", $title)) {
                $errors['title'] = 'invalid title';
            }
        }

        $description = trim($_POST['description']);
        if(empty($description)) {
            $errors['description'] = 'a description is required';
        }

        $price = trim($_POST['price']);
        if(empty($price)) {
            $errors['price'] = 'a price is required';
        } else {
            if(!preg_match("/^([0-9]+){0,1}(\.[0-9]*){0,1}$/", $price)) {
                $errors['price'] = 'invalid price';
            }
        }

        $stock = trim($_POST['stock']);
        if(empty($stock)) {
            $errors['stock'] = 'a stock is required';
        } else {
            if(!preg_match("/^[0-9]+$/", $stock)) {
                $errors['stock'] = 'ivalid stock';
            }
        }

        $isError = false;
        foreach($errors as $error) {
            if($error != '') {
                $isError = true;
                break;
            }
        }

        // if no errors, insert into products table
        if(!$isError) {
            $conn = mysqli_connect('localhost', 'user', 'user', 'warehouse');

            if($conn) {
                $sql = "INSERT INTO products (title, description, price, stock) VALUES ('$title', '$description', '$price', '$stock')";

                if(mysqli_query($conn, $sql)) {
                    header("Location: index.php");
                } else {
                    echo "Query error: " . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warehouse</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
</head>
<body>
    <header>
        <a href="index.php" style="text-decoration: none;"><h1>Warehouse</h1></a>
    </header>
    <section>
        <form action="add.php" method="POST">
            <label for="title">Title:</label>
            <input id="title" name="title" type="text" value="<?php echo htmlspecialchars($title); ?>"
                onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)">
            <div class="error"><?php echo $errors['title']; ?></div>
            <label for="description">Description:</label>
            <input id="description" name="description" type="text" value="<?php echo htmlspecialchars($description); ?>"
                onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)">
            <div class="error"><?php echo $errors['description']; ?></div>
            <label for="price">Price:</label>
            <input id="price" name="price" type="text" value="<?php echo htmlspecialchars($price); ?>"
                onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)">
            <div class="error"><?php echo $errors['price']; ?></div>
            <label for="stock">Stock:</label>
            <input id="stock" name="stock" type="text" value="<?php echo htmlspecialchars($stock); ?>"
                onfocus="colorLabel(this.id)" onfocusout="unColorLabel(this.id)"
                style="margin-bottom: 10px;">
            <div class="error"><?php echo $errors['stock']; ?></div>
            <button type="submit" style="display: block; margin: auto; width: 150px;">SUBMIT</button>
        </form>
    </section>
    <footer>
        <div class="copyright">Copyright 2019 Red Hornet Studio</div>
    </footer>
</body>
</html>