<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
$id = $_GET['id'];
$query = "UPDATE reservation SET status ='accepted' where id=$id";
if (mysqli_query($conn, $query)) {
    echo "Reservation Accepted";
} else {
    echo "Error Occours while Accepting Reservation";
}
