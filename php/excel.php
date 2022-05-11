<?php
 
$inventory = 'inventory';
header('Content-Type: application/vnd.ms-excel');  
header('Content-disposition: attachment; filename='.$inventory.'.xls');  

echo $_GET['data'];

?>