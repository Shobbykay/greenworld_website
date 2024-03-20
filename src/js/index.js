$(function(){

    $(".mobile-menu").hide();

    $(".loading").fadeOut();

    // alert($(window).width());//390

    $(document).on('submit','#subscribe__', function(e){
        e.preventDefault();
        var data = new FormData();
        data.append("email", $("#s_email").val() );

        $.ajax({
            url: "./db/subscribe.php",
            type: "POST",
            data:  data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                $("#subscribe__ button").prop('disabled', true).html("please wait..");
            },
            success: function(data) {
                var data_ = jQuery.trim(data);
                // console.log("response", data_);
                var obj = JSON.parse(data_);
                if (obj.status=="success"){
                    
                    $("#subscribe__ button").prop('disabled', false).html("Subscribe");
                    $("#subscribe__ input").val("");

                    //pop up notification
                    $(".float-success").html("Email subscribed successfully");
                    $(".float-success").fadeIn().animate({ 
                        bottom: "+=200px",
                    }, 1000 );

                    setTimeout(function() {
                        $(".float-success").animate({ 
                            bottom: "-=200px",
                        }, 1000 ).fadeOut();
                    }, 4000);
                    
                } else if (obj.status=="duplicate"){
                    // alert('Email Already Subscribed');
                    $("#subscribe__ button").prop('disabled', false).html("Subscribe");
                    $("#subscribe__ input").val("");

                    //pop up notification
                    $(".float-success").html("Email Already Subscribed");
                    $(".float-success").fadeIn().animate({ 
                        bottom: "+=200px",
                    }, 1000 );

                    setTimeout(function() {
                        $(".float-success").animate({ 
                            bottom: "-=200px",
                        }, 1000 ).fadeOut();
                    }, 4000);
                    
                } else{
                    // alert('An error ocurred while subscribing');
                    $("#subscribe__ button").prop('disabled', false).html("Subscribe");
                    $("#subscribe__ input").val("");

                    //pop up notification
                    $(".float-success").html("An error ocurred while subscribing");
                    $(".float-success").fadeIn().animate({ 
                        bottom: "+=200px",
                    }, 1000 );

                    setTimeout(function() {
                        $(".float-success").animate({ 
                            bottom: "-=200px",
                        }, 1000 ).fadeOut();
                    }, 4000);
                }

            },
            error: function(e) {
                // console.log(e);
                //pop up notification
                $(".float-success").html("An error ocurred while subscribing. Please check your network and try again.");
                $(".float-success").fadeIn().animate({ 
                    bottom: "+=200px",
                }, 1000 );

                setTimeout(function() {
                    $(".float-success").animate({ 
                        bottom: "-=200px",
                    }, 1000 ).fadeOut();
                }, 4000);
                
                $("#subscribe__ button").prop('disabled', false).html("Subscribe");
            }          
        });
    });

    $(document).on('click','.close', function(e){
        $(".mobile-menu").slideUp();
    });

    $(document).on('click','.skoiua', function(e){
        $(".mobile-menu").slideDown();
    });

    $(document).on('keydown','#amount, #phone_number', function(e){
    // $(this).keydown(function(e){
        var key = e.charCode || e.keyCode || 0;
        // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
        // home, end, period, and numpad decimal
        return (
            key == 8 || 
            key == 9 ||
            key == 13 ||
            key == 46 ||
            key == 110 ||
            key == 190 ||
            (key >= 35 && key <= 40) ||
            (key >= 48 && key <= 57) ||
            (key >= 96 && key <= 105)
        );
    });

    $(document).on('change','#state', function(e){
        $("#lga_loading").html("loading...");

        $("#lga_loading").fadeOut(5000);

        $("#lga").load("./db/states_lga.php?st="+$('#state').val(), function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success"){
                $("#lga_loading").html("");
            }

            if(statusTxt == "error"){
                $("#lga_loading").html("<span style='color: red !important;font-size: 9px !important; display: block; margin-top: -15px !important;margin-bottom: 20px !important;'>Unable to load LGA</span>");
            }
        });
    });




    $(document).on('submit','#contact__', function(e){
        e.preventDefault();
        var data = new FormData();
        data.append("name", $("#name").val());
        data.append("email", $("#email").val());
        data.append("msg", $("#msg").val());


        $.ajax({
            url: "./db/contact.php",
            type: "POST",
            data:  data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                $("#contact__ button").prop('disabled', true).html("please wait..");
            },
            success: function(data) {
                var data_ = jQuery.trim(data);
                // console.log("response", data_);
                var obj = JSON.parse(data_);
                if (obj.status=="success"){
                    // alert('Message sent successfully');
                    $("#contact__ button").prop('disabled', false).html("Send Message");
                    $("#contact__ input").val("");
                    $("#contact__ textarea").val("");
                } else{
                    // alert('Message already sent');
                    $("#contact__ button").prop('disabled', false).html("Send Message");
                    $("#contact__ input").val("");
                    $("#contact__ textarea").val("");
                    
                }

                //pop up notification
                $(".float-success").html(obj.message);
                $(".float-success").fadeIn().animate({ 
                    bottom: "+=200px",
                }, 1000 );

                setTimeout(function() {
                    $(".float-success").animate({ 
                        bottom: "-=200px",
                    }, 1000 ).fadeOut();
                }, 4000);

            
            },
            error: function(e) {
                // console.log(e);
                //pop up notification
                $(".float-success").html("An error ocurred while subscribing. Please check your network and try again.");
                $(".float-success").fadeIn().animate({ 
                    bottom: "+=200px",
                }, 1000 );

                setTimeout(function() {
                    $(".float-success").animate({ 
                        bottom: "-=200px",
                    }, 1000 ).fadeOut();
                }, 4000);
                $("#contact__ button").prop('disabled', false).html("Send Message");
            }          
        });
    });





    $(document).on('submit','#employement____', function(e){
        e.preventDefault();
        var data = new FormData();
        data.append("name", $("#name").val());
        data.append("email", $("#email").val());
        data.append("gender", $("#gender").val());
        data.append("dob", $("#dob").val());
        data.append("state", $("#state").val());
        data.append("lga", $("#lga").val());
        data.append("phone", $("#phone").val());
        data.append("nin", $("#nin").val());
        data.append("cac", $("#cac").val());
        data.append("address", $("#address").val());
        data.append("apply_grant",  $('input[name="apply_grant"]:checked').val());


        $.ajax({
            url: "./db/apply_career.php",
            type: "POST",
            data:  data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                $("#employement____ button").prop('disabled', true).html("please wait..");
            },
            success: function(data) {
                var data_ = jQuery.trim(data);
                // console.log("response", data_);
                var obj = JSON.parse(data_);
                if (obj.status=="success"){
                    // alert('Message sent successfully');
                    $("#employement____ button").prop('disabled', false).html("Apply Now");
                    $("#employement____ input").val("");
                    $("#employement____ textarea").val("");
                } else{
                    $("#employement____ button").prop('disabled', false).html("Apply Now");
                    // $("#employement____ input").val("");
                    // $("#employement____ textarea").val("");
                    
                }

                //pop up notification
                $(".float-success").html(obj.message);
                $(".float-success").fadeIn().animate({ 
                    bottom: "+=200px",
                }, 1000 );

                setTimeout(function() {
                    $(".float-success").animate({ 
                        bottom: "-=200px",
                    }, 1000 ).fadeOut();
                }, 4000);

            
            },
            error: function(e) {
                // console.log(e);
                //pop up notification
                $(".float-success").html("An error ocurred while applying. Please check your network and try again.");
                $(".float-success").fadeIn().animate({ 
                    bottom: "+=200px",
                }, 1000 );

                setTimeout(function() {
                    $(".float-success").animate({ 
                        bottom: "-=200px",
                    }, 1000 ).fadeOut();
                }, 4000);
                $("#employement____ button").prop('disabled', false).html("Apply Now");
            }          
        });
    });

});