<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="../validate/style.css" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- sigin form starts here -->

                <form class="sign-in-form" id="signInForm" autocomplete="off">
                    <h2 class="title">Sign In</h2>
                    <div id="newTxt" class="comments"></div>
                    <div class="input-field emailDiv">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email" id="userEmail" />
                    </div>

                    <div class="input-field passwordDiv">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="userPassword" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                </form>

                <!-- siginup form ends here -->
                <form action="" autocomplete="off" method="post" id="register" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div id="comment" class="comments errorColor"></div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input onkeyup="validate(this)" type="text" id="username" placeholder="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input onkeyup="validate(this)" type="email" id="useremail" class="signup_input" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input onkeyup="validate(this)" type="password" id="userpassword" class="signup_input" placeholder="Password" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input onkeyup="validate(this)" type="password" id="confirm" placeholder="Confirm Password" />
                    </div>
                    <input type="submit" class="btn" value="Sign up" />

                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="../validate/script.js"></script>

</body>

</html>