<?php
echo'index page';

require_once 'app/database/db.php';

$database = new Database();
$conn = $database->getConnection();

if ($conn) {
	echo 'Connection successful';
} else {
	echo 'Connection failed';
}



