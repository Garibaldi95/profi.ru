<?php
include '../../db.php';
$db = new Database("test-mysql" , "note_db" , "root","admin");
$db = $db->connect();

$id = $_GET['c'];

$query = "SELECT * FROM profi WHERE id = :id LIMIT 1";
$stmt = $db->prepare($query);

$params = array(
    "id" => $id
);

$stmt->execute($params);

$url = $stmt->fetch();

header("location: " . $url['long_url']);