<?php
require 'connection.php';

$employeesSession = $_POST['employeesSession'];
$emailReceiver = $_POST['emailReceiver'];
$emailMessage = $_POST['emailMessage'];

$sql = "INSERT INTO email (receiver, message, sender, datePosted, is_deleted) VALUES (?,?,?,NOW(), 0)";
$pdo->prepare($sql)->execute([$emailReceiver, $emailMessage, $employeesSession]);
if($pdo){
    echo "added Successfully";
    exit();  
}else{
    echo "Sorry, failed";
    exit();  
    } 
?>