<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';
$page_id = $_GET['page_id'];
$sql = "SELECT * FROM map WHERE admin_id = $page_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    die("Location not found");
}
$row = mysqli_fetch_assoc($result);
$name = $row['address'];
$latitude = $row['lat'];
$longitude = $row['lng'];
$data = array(
    'name' => $name,
    'latitude' => $latitude,
    'longitude' => $longitude
);
header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($conn);
