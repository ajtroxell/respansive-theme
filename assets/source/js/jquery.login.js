jQuery(document).ready(function($) {
    $("#registerform").validate({
        rules: {
            user_login: {
                required: true,
                minlength: 3
            },
            user_email: {
                required: true,
                email: true
            }
        },
        messages: {
            user_login: {
                required: "a username is required",
                minlength: "usernames must be at least 3 characters long"
            },
            email: {
                required: "a legitimate email address is required"
            }
        }
    });
});