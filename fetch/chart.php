<?php
require 'connection.php';

$query = $con->query("SELECT purchased(created) as purchasedOn,SUM(total_sales) as totalSales FROM sales GROUP BY purchasedOn");

foreach($query as $data)
{
$month[] = $data['purchasedOn'];
$amount[] = $data['totalSales'];
}
?>