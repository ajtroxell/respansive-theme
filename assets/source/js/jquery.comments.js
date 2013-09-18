$(document).ready(function () {
    $().ready(function() {
        // validate comments form
        $("#commentform").validate({
            rules: {
                author: {
                    required: true,
                    minlength: 4
                },
                email: {
                    required: true,
                    email: true
                },
                url: {
                    required: false,
                    url: true
                }
            },
            messages: {
                name: {
                    required: "Please provide a name",
                    minlength: "Your name must consist of at least 4 characters"
                },
                email: {
                    required: "Please provide an email address"
                },
                url: {
                    required: "Please provide a valid url"
                }
            }
        });
    });
});