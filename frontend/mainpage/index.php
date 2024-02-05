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
            <a href="#venue">Venue</a>
            <a href="#banquetshouse">Banquets</a>
            <a href="#location">Locations</a>
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
    </div>

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>THE BANQUET HOUSE</h3>
            <p>Where every occasion becomes a cherished memory</p>
            <a class="btn">discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images/vid-2.mp4"></span>
            <span class="vid-btn" data-src="images/vid-1.mp4"></span>
        </div>

        <div class="video-container">
            <video src="images/vid-2.mp4" id="video-slider" loop autoplay muted></video>
        </div>

    </section>

    <!-- user profile -->
    <!-- The user profile section is removed for simplicity -->

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
                <div class="image-text">
                    <h3>Wedding</h3>
                </div>
            </div>
            <div class="image-item">
                <div class="image-text">
                    <h3>Conference</h3>
                </div>
            </div>
            <div class="image-item">
                <div class=" image-text">
                    <h3>Others</h3>
                </div>
            </div>
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
            <div class="box">
                <div class="content">
                    <h3>Sample Banquet <p>100 Guests</p>
                    </h3>
                    <h3> <i class="fas fa-map-marker-alt"></i> Sample Address</h3>
                    <p>Sample details about the banquet.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn">View More</a>
                </div>
            </div>
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
                <p>Herald College is an educational institution that offers a variety of academic programs.
                    If you are looking for detailed and up-to-date information about this specific Herald College,
                    I recommend checking their official website or contacting them directly.</p>
            </div>
            <div class="box">
                <h3>Available Locations</h3>
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
        <h1 class="credit">created by<span> Herald College</span> | all right reserved !</h1>
    </section>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>
    <script>
        function toggleProfileModal() {
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
        }
    </script>

</body>

</html>