$(document).ready(function () {
    $(function () {
        $('#commentform #url').val("http://");
        $( "label[for='comment']" ).append( " <span class='required'>*</span>" );
    });
    $().ready(function() {
        // validate comments form
        $("#commentform").validate({
            rules: {
                author: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                url: {
                    required: false,
                    url: true
                },
                comment: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "come on, you have a name don't you?",
                    minlength: "your name must consist of at least 2 characters"
                },
                email: {
                    required: "no email, no comment..."
                },
                url: {
                    required: "that url isn't going to work."
                },
                comment: {
                    minlength: "you have to at least write something!"
                }
            }
        });
    });
});