<?php
include '../../db.php';
$db = new Database("test-mysql" , "note_db" , "root","admin");
$db = $db->connect();

$url = $_POST['long_url'];

$query = "INSERT INTO profi(long_url) VALUES (:long_url)";
$stmt = $db->prepare($query);
$params = array(
    "long_url" => $url
);
$result = $stmt->execute($params);
header("location: /?i=" . $db->lastInsertId());
?>
