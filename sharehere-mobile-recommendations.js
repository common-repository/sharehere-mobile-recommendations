
jQuery(document).ready(
    function($){
        $("#sherehere-signup").click(
            function() {
                if (!$("#agree_terms").is(':checked') || !$("#agree_privacy").is(':checked') || !$("#agree_display").is(':checked'))
                {
                    alert("Please agree to the terms before continuing.");
                    return false;
                }
                var email = $('#email').val();
                var url = $('#url').val();
                var feed_url = $('#feed_url').val();
                $.ajax({
                     url:"http://sharehere.com/wordpress_signup",
                     data: {
                        email:email,
                        url:url,
                        feed_url:feed_url
                     },
                     dataType: 'jsonp',
                     success:function(json){
                        var tag_id = json['tag_id'];
                        if (tag_id === 0) {
                            $('#sharehere-signup-status').replaceWith("E-mail address is invalid or already in use.");
                        }
                        else {
                            $('#sharehereTagID').val(tag_id);
                            $('#embeddedSignUp').val('1');
                            $('#sharehereSettingsSubmit').click();
                        }
                     },
                     error:function(x,y){
                         $('#sharehere-signup-status').replaceWith("Error - unable to contact ShareHere ("+y+")");
                     },
                });
            }
        )
    }
);
