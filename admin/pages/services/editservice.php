<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="../sidebar/style.css">
    <link rel="stylesheet" href="style2.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="sidebar close">
        <?php
        include '../sidebar/sidebar.php';
        ?>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Dashboard</span>
        </div>

        <div class="container">
            <div class="main-container">
                <a href="manageservice.php"> <i class='bx bx-left-arrow-alt'></i>Go Back</a>
                <h1>Edit Services</h1>
                <form method="post" action="">
                    <?php
                    $id = $_GET['id'];
                    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbservice WHERE id =$id "));
                    // print_r($id);
                    ?>

                    <input type="hidden" name="id" id="service-id" value="<?php echo $row['id']; ?>">
                    <label for="Icon-name">Icon type:</label>
                    <select id="icons" style="font-size:16px;padding:10px;">
                        <option value="fas fa-map-marker-alt">Map</option>
                        <option value="fas fa-envelope">Invitation Card</option>
                        <option value="ffas fa-utensils">Food and Drinks</option>
                        <option value="fas fa-photo-video">photos and Video</option>
                        <option value="fas fa-birthday-cake">Birthday Cake</option>
                    </select>
                    <label for="service-name">Service name:</label>
                    <input type="text" id="service-name" name="service-name" value="<?php echo $row['servicename']; ?>">

                    <label for="service-description">Service description:</label>
                    <textarea id="service-description" name="service-description"><?php echo $row['servicedesc']; ?></textarea>

                    <label for="service-price">Service price:</label>
                    <input type="number" id="service-price" name="service-price" value="<?php echo $row['serviceprice']; ?>">
                    <button class="add" onclick="submitData('edit');" name="update">Update</button>
                </form>
            </div>
        </div>

    </section>
</body>
<?php require 'script.php'; ?>
<script src="../sidebar/script.js"></script>

</html>