<?php

require_once 'config.php';
require_once 'Database.php';
 
$conn = Database::getInstance();
$sql = "SELECT * FROM users";	
$stmt = $conn->prepare($sql);
$stmt->execute();

$obj = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach ($obj as $linha) {
	echo "<b>Name:</b> " . $linha->first_name . " - <b>Email:</b> " . $linha->email_id."</br>";
}
    