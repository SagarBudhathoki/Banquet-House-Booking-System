<?php
require '/xampp/htdocs/banquet-house-main/connection/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banquet house</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.1/leaflet.markercluster.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- header section starts  -->

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#home" class="logo"><span>BANQUET</span>HOUSE</a>

        <nav class="navbar">
            <!-- <a href="#home">home</a> -->
            <a href="#venue">Venue</a>
            <a href="#banquetshouse">Banquets</a>
            <a href="#location">Locations</a>
            <!-- <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a> -->
        </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <button id="login-btn" style="background: transparent;" onclick="toggleProfileModal()"><i class="fas fa-user"></i></button>

        </div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" onclick="search()" class="fas fa-search"></label>
        </form>

    </header>
    <!-- header section ends -->

    <!-- login form container  -->

    <div class="login-form-container">

        <i class="fas fa-times" id="form-close"></i>

        <!-- <form action="">
            <h3>login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have and account? <a href="#">register now</a></p>
        </form> -->

    </div>

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>THE BANQUET HOUSE</h3>
            <p>Where every occasion becomes a cherished memory</p>
            <a href="../mainpage/viewall/allbanquets.php" class="btn">discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images/vid-2.mp4"></span>
            <span class="vid-btn" data-src="images/vid-1.mp4"></span>
            <!-- <span class="vid-btn" data-src="images/vid-2.mp4"></span> -->
            <!-- <span class="vid-btn" data-src="images/vid-4.mp4"></span> 
            <span class="vid-btn" data-src="images/vid-5.mp4"></span> -->
        </div>

        <div class="video-container">
            <video src="images/vid-2.mp4" id="video-slider" loop autoplay muted></video>
        </div>

    </section>
    <!-- user profile -->
    <?php if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $profile = mysqli_query($conn, "SELECT * FROM user where id=$user_id");
        $profileresult = mysqli_fetch_assoc($profile);
        $selectimg = mysqli_query($conn, "SELECT * FROM `profile` where user_id=$user_id");
        $fetchimg = mysqli_fetch_assoc($selectimg);
    ?>
        <div id="profile-modal">
            <div id="profile-modal-content">
                <div id="profile-modal-close">&times;</div>
                <div id="profile-info">
                    <h1>User <span style="color:#007aff;">Profile</span></h1>
                    <?php
                    if (empty($fetchimg['profile'])) {
                    ?>
                        <img src="../../profileimage/profile.png" alt="default profile">
                    <?php
                    } else {
                    ?>
                        <img src="../../profileimage/<?php echo $fetchimg['profile']; ?>" alt="default profile">
                    <?php
                    }
                    ?>
                    <h3><?php echo $profileresult['name'] ?></h3>
                    <div class=" edit-profile">
                        <button class="profile-edit" onclick="location.href='userprofile/editprofile.php'">Edit
                            Profile</button>
                    </div>
                    <a href="../../user-admin/user-admin-reg.php?<?php echo $user_id ?>">
                        <h2>have a banquet to register your banquet</h2>
                    </a> <a href="logout.php" id="userlogout"><i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php }
    ?>

    <!-- book section ends -->
    <section class="packages" id="packages">
        <div id="search-results"></div>
    </section>
    <!-- packages section starts  -->
    <section class="packages" id="nearby">
        <div id="banquets"></div>
    </section>

    <!-- our venu section starts here -->
    <section class="packages" id="venue">

        <h1 class="heading">
            <span>O</span>
            <span>U</span>
            <span>R</span>
            <span class="space"></span>
            <span>V</span>
            <span>E</span>
            <span>N</span>
            <span>U</span>
            <span>E</span>
        </h1>
        <div class="image-collection" id="venue">
            <div class="image-item">
                <img src="./uploads/wedding.jpg" alt="Image 1" onclick="location.href='venue.php?type=wedding';">
                <div class="image-text">
                    <h3>Wedding</h3>
                </div>
            </div>
            <div class="image-item">
                <img src="./uploads/conference.jpg" alt="Image 2" onclick="location.href='venue.php?type=conference';">
                <div class="image-text">
                    <h3>Conference</h3>
                    <!-- <p>Image 2 description goes here</p> -->
                </div>
            </div>
            <div class="image-item">
                <img src="./uploads/63f784bfe1a3e0.12268603.jpg" alt="Image 3" onclick="location.href='venue.php?type=other';">
                <div class=" image-text">
                    <h3>Others</h3>
                    <!-- <p>Image 3 description goes here</p> -->
                </div>
            </div>
            <!-- add more image items here -->
        </div>


    </section>
    <!-- our venue section ends here -->


    <section class="packages" id="banquetshouse">

        <h1 class="heading">
            <span>B</span>
            <span>a</span>
            <span>n</span>
            <span>q</span>
            <span>u</span>
            <span>e</span>
            <span>t</span>
            <span>s</span>
        </h1>
        <div class="box-container">
            <?php
            $rows = mysqli_query($conn, "SELECT map.*, banquet.*, AVG(review.rating) as average_rating 
      FROM map
      JOIN banquet ON map.admin_id = banquet.admin_id
      LEFT JOIN review ON map.admin_id = review.admin_id
      WHERE banquet.status = 'active'
      GROUP BY map.admin_id
      ORDER BY map.admin_id
      LIMIT 3;");

            $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM banquet where status='active'"));
            foreach ($rows as $row) :
                if ($row['status'] !== 'pending' && $row['status'] !== 'deactive') {
                    $address_parts = explode(',', $row['address']);
                    $address = trim($address_parts[0]);
            ?>
                    <div class="box">
                        <img src="../../user-admin/uploads/<?php echo $row["image"]; ?>" alt="">
                        <div class="content">
                            <h3><?php echo $row["banquetname"]; ?> <p><?php echo $row["capacity"]; ?> Guests</p>
                            </h3>

                            <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $address; ?></h3>
                            <p><?php echo $row["details"]; ?></p>

                            <div class="stars">
                                <?php
                                // Show average rating as stars
                                $avg_rating = $row['average_rating'];
                                $full_stars = floor($avg_rating);
                                $half_star = round($avg_rating - $full_stars, 1);
                                $empty_stars = 5 - $full_stars - $half_star;
                                for ($i = 0; $i < $full_stars; $i++) {
                                    echo '<i class="fas fa-star"></i>';
                                }
                                if ($half_star == 0.5) {
                                    echo '<i class="fas fa-star-half-alt"></i>';
                                }
                                for ($i = 0; $i < $empty_stars; $i++) {
                                    echo '<i class="far fa-star"></i>';
                                }
                                ?>
                            </div>
                            <!-- <div class="price"> $90.00 <span>$120.00</span> </div> -->
                            <a href="../landingpage/home.php?page_id=<?php echo $row["admin_id"]; ?>" class="btn">View
                                More</a>
                        </div>
                    </div>
                <?php
                }
            endforeach;
            if ($count > 3) {
                ?>
                <button class="view-more" onclick="location.href='./viewall/allbanquets.php';">View All</button>
            <?php
            }
            ?>
        </div>

    </section>
    <section class="Location" id="location">
        <h1 class="heading">
            <span>L</span>
            <span>O</span>
            <span>C</span>
            <span>A</span>
            <span>T</span>
            <span>I</span>
            <span>O</span>
            <span>N</span>
            <span>S</span>
        </h1>
        <div id="map" style="height: 500px; margin-top: 50px; z-index:0;"></div>
    </section>
    <!-- footer section -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>about us</h3>
                <p>GoFFy Guys is a team of Kantipur City College students who created this website for their academic
                    requirements. The website provides information on programming, web development, and computer
                    science. Their goal is to provide accurate and useful information.</p>
            </div>
            <div class="box">
                <h3>Avilabe Locations</h3>
                <a href="#">Kathmandu</a>
                <a href="#">Pokhara</a>
                <a href="#">Dharan</a>
                <a href="#">Dhankuta</a>

            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#venue">venue</a>
                <a href="#banquetshouse">Banquet</a>
                <a href="#location">Location</a>
                <a href="../../login/index.php">Login</a>

            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">Twitter</a>
                <a href="#">github</a>

            </div>
        </div>
        <h1 class="credit">created by<span> GoFFy Guys</span> | all right reserved !</h1>
    </section>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>
    <script>
        function toggleProfileModal() {
            // Check if the user is logged in
            <?php if (isset($_SESSION['user_id'])) { ?>
                var profileModal = document.getElementById("profile-modal");
                profileModal.style.display = profileModal.style.display === "block" ? "none" : "block";
            <?php } else { ?>
                swal({
                    title: "Login To View Your Profile",
                    text: "Do you want to go to the login page?",
                    icon: "warning",
                    buttons: ["Cancel", "Login"],
                    className: "custom-alert-box",
                }).then((value) => {
                    if (value) {
                        window.location.href = "../../login/index.php";
                    }
                });
            <?php } ?>
        }
    </script>

</body>

</html>