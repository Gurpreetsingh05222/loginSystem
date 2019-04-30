$(function(){

    $("#register_email").on('change', function(){

        var email = $(this).val();

        $.post("ajax_functions.php", {email : email}, function(data){

            $(".db-feedback").html(data);

        });

    });

});
