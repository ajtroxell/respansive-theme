jQuery(document).ready(function(e){e("#registerform").validate({rules:{user_login:{required:!0,minlength:3},user_email:{required:!0,email:!0}},messages:{user_login:{required:"a username is required",minlength:"usernames must be at least 3 characters long"},email:{required:"a legitimate email address is required"}}})});