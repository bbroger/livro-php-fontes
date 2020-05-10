<?php
include 'config.php';

// Number of records fetch
$numberofrecords = 10;

if(!isset($_POST['searchTerm'])){

	// Fetch records
	$stmt = $conn->prepare("SELECT * FROM users ORDER BY name LIMIT :limit");
	$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
	$stmt->execute();
	$usersList = $stmt->fetchAll();

}else{

	$search = $_POST['searchTerm'];// Search text
	
	// Fetch records
	$stmt = $conn->prepare("SELECT * FROM users WHERE name like :name ORDER BY name LIMIT :limit");
	$stmt->bindValue(':name', '%'.$search.'%', PDO::PARAM_STR);
	$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
	$stmt->execute();
	$usersList = $stmt->fetchAll();

}
	
$response = array();

// Read Data
foreach($usersList as $user){
	$response[] = array(
		"id" => $user['id'],
		"text" => $user['name']
	);
}

echo json_encode($response);
exit();
