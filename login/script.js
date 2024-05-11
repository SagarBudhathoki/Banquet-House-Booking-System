
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

function toggle(element) {
    if (state) {
        element.nextElementSibling.setAttribute("type", "password");
        element.style.color = "#7a797e";
        state = false;
    } else {
        element.nextElementSibling.setAttribute("type", "text");
        element.style.color = "#5887ef";
        state = true;
    }
}

$(document).ready(function () {
    $("#signInForm").submit(function (e) {
        e.preventDefault();
        var email = $("#userEmail").val(),
            password = $("#userPassword").val();

        $.post(
            "function.php",
            {
                email: email,
                password: password,
                action: 'signin'
            },
            function (response) {
                console.log(response);
                if (response == "Admin Login Successful") {
                    window.location.href = "http://localhost/Banquet-house/admin/pages/dashboard/index.php";
                } else if (response == "User Login Successful") {
                    window.location.href = "http://localhost/Banquet-house/frontend/mainpage/index.php";
                } else if (response == "super admin login sucessful") {
                    window.location.href = "http://localhost/Banquet-house/superadmin/pages/dashboard/index.php";
                } else {
                    $("#newTxt").html("Something went wrong !!! ").addClass("errorColor");
                    var tmpTime = setTimeout(function () {
                        $("#newTxt").html("");
                        $("#newTxt").removeClass();
                        clearTimeout(tmpTime);
                    }, 4000);
                }
            }
        );
    });

    $("#register").submit(function (e) {
        e.preventDefault();
        var success = $("#register .successTrack").length;
        if (success == 4) {
            $.post(
                "function.php",
                {
                    action: 'signup',
                    name: $("#name").val(),
                    username: $("#username").val(),
                    useremail: $("#useremail").val(),
                    password: $("#userpassword").val(),
                    confirm: $("#confirm").val()
                },
                function (response) {
                    if (response == "success") {
                        $("#newTxt").html("SignUp Successful").addClass("successColor");
                        sign_in_btn.click();
                        var tmpTime = setTimeout(function () {
                            $("#newTxt").html("");
                            $("#newTxt").removeClass();
                            clearTimeout(tmpTime);
                        }, 5000);
                    } else {
                        $("#comment").html(response).addClass("errorColor");
                        var tmpTime = setTimeout(function () {
                            $("#comment").html("");
                            $("#comment").removeClass();
                            clearTimeout(tmpTime);
                        }, 5000);
                    }
                }
            );

        } else {
            $("#comment").html("All fields requirements are not fulfilled!!");
            var tmpTime = setTimeout(function () {
                $("#comment").html("");
                $("#comment").removeClass();
                clearTimeout(tmpTime);
            }, 5000);
        }
    });
});
