<?php include 'header.php'; ?>
<?php require_once 'data/database.php'; ?>

<?php 

    $db = new DatabaseMyShop();

    $conn = $db->connect();

    $rows = $conn->query("SELECT * FROM categories");

?>


<div class="sidebar">
    <div class="input-group-btn">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Name category
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <?php foreach($rows as $index => $row):?>

                <a class="dropdown-item" href="showdata.php?category_id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="content">
<?php
    $category_id =NULL;

        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        }
        else {
            $statement = $conn->query("SELECT id FROM categories LIMIT 1");
            $list = $statement->fetch();
            $category_id = $list['id'];
        }
    $product_choose = $conn->query("SELECT * FROM products WHERE `category_id`=".$category_id);
    $products = $product_choose->fetchAll();
?>
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Code</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $index => $product):?>
            <tr>
                <td scope="row"><?php echo ($index + 1)?></td>
                <td><?php echo $product['code']?></td>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['price']?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>



<?php include 'footer.php';?>