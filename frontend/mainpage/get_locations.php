<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';

$sql = "SELECT map.*, banquet.*, AVG(review.rating) AS average_rating
        FROM map
        JOIN banquet ON map.admin_id = banquet.admin_id
        LEFT JOIN review ON map.admin_id = review.admin_id
        WHERE banquet.status = 'active'
        GROUP BY map.admin_id";
$result = $conn->query($sql);
$locations = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $location = array(
            'name' => $row['banquetname'],
            'admin_id' => $row['admin_id'],
            'image' => $row['image'],
            'latitude' => $row['lat'],
            'longitude' => $row['lng'],
            'average_rating' => round($row['average_rating'], 1)
        );
        array_push($locations, $location);
    }
}
header('Content-Type: application/json');
echo json_encode($locations);
