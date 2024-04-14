<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../sidebar/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="sidebar close">
        <?php
        include '../sidebar/sidebar.html';
        ?>

    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Dashboard</span>
        </div>
        <div class="main">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">Services</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-solid fa-hammer"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">Gallery</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-thin fa-image"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">Packages</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-thin fa-books"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">New Booking</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-solid fa-book"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">Approved Booking</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-solid fa-book"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">Rejected Booking</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-solid fa-book"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">Unread Queries</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-regular fa-question"></i>
                    </div>
                </div>
            </div>

            <section class="comments">
                <h2>User Reviews</h2>
                <div class="comment-container">
                    <!-- This part will be populated dynamically with PHP -->
                </div>
            </section>
        </div>
    </section>
    <script src="../sidebar/script.js"></script>
</body>

</html>