jQuery(document).ready(function($) {
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value);
    }, "type the correct answer -_-");
    $("#register").validate({
        rules: {
            user_login: {
                required: true,
                minlength: 2
            },
            user_email: {
                required: true,
                email: true
            },
            answer: {
                required: true,
                answercheck: true
            }
        },
        messages: {
            user_login: {
                required: "a username is required",
                minlength: "usernames must be at least 2 characters long"
            },
            user_email: {
                required: "a legitimate email address is required"
            },
            answer: {
                required: "sorry, wrong answer!"
            }
        }
    });
    $("#login").validate({
        rules: {
            log: {
                required: true,
                minlength: 2
            },
            pwd: {
                required: true
            },
            answer: {
                required: true,
                answercheck: true
            }
        },
        messages: {
            log: {
                required: "a username is required",
                minlength: "usernames must be at least 2 characters long"
            },
            pwd: {
                required: "can't login without a password dummy"
            },
            answer: {
                required: "sorry, wrong answer!"
            }
        }
    });
});