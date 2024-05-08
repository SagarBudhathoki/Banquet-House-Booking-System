
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const signin_listener = document.querySelector(".signin_input");
const signup_listener = document.querySelector(".signup_input");
const signup_btn = document.querySelector("#signup_btn");
const signin_btn = document.querySelector("#signin_btn");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

signup_btn.addEventListener("click", () => {
    submitData('signup');
});

signin_btn.addEventListener("click", () => {
    submitData('signin');
});

signin_listener.addEventListener("keyup", (event) => {
    if (event.key === "Enter") {
        event.preventDefault();
        submitData('signin');
    }
});

signup_listener.addEventListener("keyup", (event) => {
    if (event.key === "Enter") {
        event.preventDefault();
        submitData('signup');
    }
});

function submitData(action) {

    $(document).ready(function () {
        var data = {
            action: action,
            name: $("#name").val(),
            username: $("#username").val(),
            email: $("#email").val(),
            useremail: $("#useremail").val(),
            password1: $("#password").val(),
            password: $("#userpassword").val(),
            confirm: $("#confirm").val()
        };
        console.log(data);
        console.log(password);

        $.ajax({
            url: 'function.php',
            type: 'post',
            data: data,
            success: function (response) {
                console.log(data);

                if (response == "Admin Login Successful") {
                    window.location.href =
                        "http://localhost/Banquet-house/admin/pages/dashboard/index.php";

                } else if (response == "User Login Successful") {

                    window.location.href = "http://localhost/Banquet-house/frontend/mainpage/index.php";
                } else if (response == "super admin login sucessful") {
                    window.location.href =
                        "http://localhost/Banquet-house/superadmin/pages/dashboard/index.php";
                } else if (response == "user not registered") {
                    alert(response);
                } else if (response == 1) {
                    alert(response);
                    window.location.href = "index.php";
                } else {
                    alert(response);
                }
            }
        });
    });
}

function validate(ele) {
    var regExpression = /[]/;
    if (ele.type == "text") {
        regExpression = /^[A-Z]{2,}$/i;
    } else if (ele.type == "password") {
        ele.previousElementSibling.style.color = "#7a797e";
        regExpression =
            /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,32})/;
    } else if (ele.type == "email") {
        regExpression = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    } else if (ele.type == "number") {
        regExpression = /^9\d{9}$/;
    }
    if (ele.value.match(regExpression)) {
        ele.parentElement.classList.add("successTrack");
        ele.parentElement.classList.remove("errorTrack");
        const pass =
            ele.parentElement.previousElementSibling.lastElementChild.value;
        if (
            ele.placeholder == "Confirm Password" &&
            pass != ele.value &&
            pass != ""
        ) {
            ele.parentElement.classList.add("errorTrack");
            ele.parentElement.classList.remove("successTrack");
        }
        $(ele).parent().siblings(".comments").html("");
    } else {
        if (ele.placeholder == "Password") {
            $(ele)
                .parent()
                .siblings(".comments")
                .html(
                    "Password must contain at least 8-32 characters including number, special character, upper and lowercase"
                );
            var tmpTime = setTimeout(function () {
                $(ele).parent().siblings(".comments").html("");
                clearTimeout(tmpTime);
            }, 5000);
        }
        ele.parentElement.classList.add("errorTrack");
        ele.parentElement.classList.remove("successTrack");
    }
}