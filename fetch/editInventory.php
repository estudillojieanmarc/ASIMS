<?php
require 'connection.php';
        $inventoryId = $_POST['inventoryId'];
        $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_image, b.item_description, b.item_stock, b.item_brand, b.item_category, b.item_price, c.brand_id, c.brand 
        FROM categoryname a, inventory b, brandname c WHERE a.cat_id = b.item_category AND b.item_brand = c.brand_id  AND b.id = $inventoryId";
        $statement=$pdo->prepare($qry);
        $statement->execute();
        $fetchInventory = $statement->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($fetchInventory);
?>