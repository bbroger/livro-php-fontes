<?php

class pdoCrud{
 private $host="localhost";
 private $user="root";
 private $db="estudantes";
 private $pass="mysql";
 private $conn;

 public function __construct(){
	$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
 }

 public function showData($table){
	$sql="SELECT * FROM $table";
	$q = $this->conn->query($sql) or die("failed!");
	
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
	}
	return $data;
}

 public function getById($id,$table){
	$sql="SELECT * FROM $table WHERE id = :id";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':id'=>$id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	return $data;
 }

 public function update($id,$name,$email,$mobile,$address,$table){
	$sql = "UPDATE $table SET name=:name,email=:email,mobile=:mobile,address=:address WHERE id=:id";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':id'=>$id,':name'=>$name,':email'=>$email,':mobile'=>$mobile,':address'=>$address));
	return true;
 }

 public function insertData($name,$email,$mobile,$address,$table){
	$sql = "INSERT INTO $table SET name=:name,email=:email,mobile=:mobile,address=:address";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':name'=>$name,':email'=>$email,':mobile'=>$mobile,':address'=>$address));
	return true;
 }

 public function deleteData($id,$table){
	$sql="DELETE FROM $table WHERE id=:id";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':id'=>$id));
	return true;
 }
}
// Cr�dito
// http://www.w3programmers.com/crud-with-pdo-and-oop-php/
// Ver tamb�m: http://www.w3programmers.com/php-data-object-pdo-basic/
?>
