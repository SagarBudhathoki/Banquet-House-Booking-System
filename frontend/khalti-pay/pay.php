<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';

$args = http_build_query(array(
  'token' => $_POST['token'],
  // 'amount'  => $cost['reservation_cost']
  'amount'  => 1000
));

$url = "https://khalti.com/api/v2/payment/verify/";

# Make the call using API.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = ['Authorization: Key test_secret_key_6cb3cdeb480847de8eed9c87aa5370a7'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Response
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($status_code == 200) {
  mysqli_query($conn, "UPDATE `reservation` SET `status` = 'paid' WHERE `user_id`='" . $_POST['id'] . "'");
  echo "success";
} else {
  echo "failed";
}
