    <link rel='stylesheet' href='css/contact.css' type='text/css' media='all' />
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"> </script>
    <script type="text/javascript" src="js/jquery.form.js"> </script>
    <script type="text/javascript" src="js/jquery.validate.js"> </script>
    <script type="text/javascript" src="js/cmxforms.js"> </script>


    <script type="text/javascript">
        $().ready(function() {
                // validate the comment form when it is submitted

                var loader = jQuery('<div id="loader"><img src="images/loading.gif" alt="loading..." /></div>')
                    .css({position: "relative", top: "1em", left: "25em"})
                    .appendTo("#contact-form")
                    .hide();
    
                jQuery().ajaxStart(function() {
                        loader.show();
                }).ajaxStop(function() {
                                loader.hide();
                }).ajaxError(function(a, b, e) {
                        throw e;
                });


                $("#commentForm").validate({
                        submitHandler: function(form) {
                        jQuery(form).ajaxSubmit({
                              target: "#result"
                              });
                        }
                 });
        });                             
   </script>
   <style>
#commentForm { width: 500px; }
#commentForm label { width: 250px; }
#commentForm label.error, #commentForm input.submit { margin-left: 253px; }
   </style>
