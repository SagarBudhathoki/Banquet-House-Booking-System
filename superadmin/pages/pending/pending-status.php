<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';
$admin_id = $_SESSION['super_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
$id = $_GET['id'];
$adminid = $_GET['adminid'];
$qry = mysqli_query($conn, "SELECT banquet.id as requestid, banquet.*, user.*, map.*, banquet.type as banquettype
                            FROM banquet 
                            JOIN user ON user.id=banquet.admin_id 
                            JOIN map ON map.admin_id=banquet.admin_id 
                            WHERE user.id=$adminid");

$result = mysqli_fetch_assoc($qry);


?>
<div class="detail">
    <div class="detail-item">
        <span class="detail-label">Banquet Name:</span>
        <span class="detail-value"><?php echo $result['banquetname'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">User Name:</span>
        <span class="detail-value"><?php echo $result['name'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Email:</span>
        <span class="detail-value"><?php echo $result['email'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">location</span>
        <span class="detail-value"><?php echo $result['address'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Capacity</span>
        <span class="detail-value"><?php echo $result['capacity'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Type</span>
        <span class="detail-value"><?php echo $result['banquettype'] ?></span>
    </div>

    <div class="detail-item <?php echo strtolower($result['status']) ?>">
        <span class="detail-label">Status:</span>
        <span class="detail-value"><?php echo $result['status'] ?></span>
    </div>
    <div class="action-buttons">
        <button id="acceptBtn" onclick="acceptReservation('<?php echo $id ?>', '<?php echo $adminid ?>')">Accept</button>
        <button id="rejectBtn" onclick="rejectReservation('<?php echo $id ?>', '<?php echo $adminid ?>')">Reject</button>
    </div>
</div>