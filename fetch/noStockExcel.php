<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=No Stock.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
    error_reporting(0);
 
    require 'connection.php';
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
                <th>#</th>
                <th>Barcode</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Stock (pcs)</th>
				</tr>
			<tbody>
	";
    $qry = "SELECT a.cat_id, a.category, b.id, b.item_name, b.item_barcode, b.item_stock, b.item_brand, b.item_category, b.item_price, c.brand_id, c.brand
    FROM categoryname a , inventory b , brandname c WHERE a.cat_id = b.item_category AND b.item_stock = 0 ORDER BY b.item_stock ASC";    
    $statement=$pdo->prepare($qry);
    $statement->execute();
    $fetchStock = $statement->fetchAll(PDO::FETCH_OBJ);
    $count = $statement->rowCount();
    if($count>0){
        foreach($fetchStock as $totalInventory){
            $n++;
            $output .= "
            <tr>
                <td>$n</td>
                <td>$totalInventory->item_barcode</td>
                <td>$totalInventory->item_name</td>
                <td>$totalInventory->category</td>
                <td>$totalInventory->brand</td>
                <td>$totalInventory->item_stock</td>
            </tr>
            ";
        }
    }
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>
