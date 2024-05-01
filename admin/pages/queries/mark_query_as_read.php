<?php
// include database connection file
require '/xampp/htdocs/Banquet-house/connection/config.php';

// check if query ID is set and is a valid number
$queryId = $_POST['id'];

// Update the "STATUS" column of the query in the database to "read"
mysqli_query($conn, "UPDATE query SET STATUS='read' WHERE id='$queryId'");

// Send a response back to the XHR request with a success message
echo 'Query marked as read.';
