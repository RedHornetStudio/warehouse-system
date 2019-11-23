<?php 

    $conn = mysqli_connect('localhost', 'redhornet', 'redhornet', 'warehouse');

    if(!$conn) {
        echo "Connection error: " . mysqli_connect_error();
    }

    $sql = 'SELECT * FROM products ORDER BY id DESC';

    $result = mysqli_query($conn, $sql);

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warehouse</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <a href="index.php" style="text-decoration: none;"><h1>Warehouse</h1></a>
    </header>
    <section>
        <a href="add.php"><button>ADD NEW PRODUCT</button></a>
        <table>
            <caption><strong>Products list</strong></caption>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
            <?php foreach($products as $product) { ?>
            <tr>
                <td class="id"><?php echo $product['id']; ?></td>
                <td class="title"><?php echo $product['title']; ?></td>
                <td class="description"><?php echo $product['description']; ?></td>
                <td class="price"><?php echo '€' . $product['price']; ?></td>
                <td class="stock"><?php echo $product['stock']; ?></td>
                <td class="update"><button type="button">UPDATE</button></td>
                <td class="delete"><button type="button" id="<?php echo $product['id']; ?>">DELETE</button></td>
            </tr>
            <?php } ?>
        </table>
    </section>
    <footer>
        <div class="copyright">Copyright 2019 Red Hornet Studio</div>
    </footer>
</body>
</html>