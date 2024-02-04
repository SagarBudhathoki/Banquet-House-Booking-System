<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
    function submitData(action) {

        $(document).ready(function() {
            var data = {
                action: action,
                name: $("#name").val(),
                username: $("#username").val(),
                email: $("#email").val(),
                useremail: $("#useremail").val(),
                password1: $("#password").val(),
                password: $("#userpassword").val(),
                confirm: $("#confirm").val(),

            };
            console.log(data);
            console.log(password);

            $.ajax({
                url: 'function.php',
                type: 'post',
                data: data,
                success: function(response) {
                    console.log(data);


                }
            });
        });
    }
</script>