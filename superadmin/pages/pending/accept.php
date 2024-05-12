<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';
$admin_id = $_SESSION['super_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
$id = $_GET['id'];
$adminid = $_GET['adminid'];
$reservation_cost = $_GET['cost'];

$query = "UPDATE `banquet` SET `status` = 'active', `reservation_cost` = $reservation_cost where `id` = $id";
if (mysqli_query($conn, $query)) {
    $query = "UPDATE user SET type = 'admin' where id=$adminid";
    mysqli_query($conn, $query);
    echo "banquet Accepted";
} else {
    echo "Error Occours while Accepting Banquet";
}
