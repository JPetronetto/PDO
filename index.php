<?php

require_once 'config.php';
require_once 'Database.php';


$conn = Database::getInstance();
$sql = "SELECT * FROM users";	
$stmt = $conn->prepare($sql);
$stmt->execute();

while ($obj = $stmt->fetch (PDO::FETCH_OBJ)) {
    echo "<b>Name:</b> " . $obj->first_name . " - <b>Email:</b> " . $obj->email_id."</br>";
}