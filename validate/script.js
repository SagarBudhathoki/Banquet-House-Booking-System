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
    } else if (ele.type == "number" || ele.type == "tel") {
        regExpression = /^9\d{9}$/;
    }
    if (ele.value.match(regExpression)) {
        ele.parentElement.classList.add("successTrack");
        ele.parentElement.classList.remove("errorTrack");
        const pass = ele.parentElement.previousElementSibling.lastElementChild.value;
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


