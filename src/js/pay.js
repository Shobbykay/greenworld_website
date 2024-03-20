$(function(){

    $(document).on('submit','#donate__', function(e){
        e.preventDefault();

        var handler = PaystackPop.setup({ 
            key: 'pk_live_777fa33d73b6a5c648f70542b0c35cf702facf24', //put your public key here
            email: $("#d_email").val(), //put your customer's email here
            amount: parseInt($("#d_amount").val()) * 100, //amount the customer is supposed to pay
            metadata: {
                custom_fields: [
                    {
                        display_name: "Greenworld Customer",
                        variable_name: "mobile_number",
                        value: $("#d_phone").val() //customer's mobile number
                    }
                ]
            },
            callback: function (response) {
                var data = new FormData();
                data.append("name", $("#d_name").val());
                data.append("email", $("#d_email").val());
                data.append("phone", $("#d_phone").val());
                data.append("amount", $("#d_amount").val());
                data.append("reference", response.reference);

                $.ajax({
                    url: "./db/donate.php",
                    type: "POST",
                    data:  data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend : function(){
                        $("#donate__ button").prop('disabled', true).html("please wait..");
                    },
                    success: function(data) {
                        var data_ = jQuery.trim(data);
                        // console.log("response", data_);
                        var obj = JSON.parse(data_);
                        if (obj.status=="success"){
                            
                            $("#donate__ button").prop('disabled', false).html("Donate with Card");
                            $("#donate__ input").val("");

                            //pop up notification
                            $(".float-success").html("Thank you for donating to our project");
                            $(".float-success").fadeIn().animate({ 
                                bottom: "+=200px",
                            }, 1000 );

                            setTimeout(function() {
                                $(".float-success").animate({ 
                                    bottom: "-=200px",
                                }, 1000 ).fadeOut();
                            }, 4000);
                            
                        } else{
                            
                            $("#donate__ button").prop('disabled', false).html("Donate with Card");
                            // $("#donate__ input").val("");

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
                        }

                    },
                    error: function(e) {
                        // console.log(e);
                        //pop up notification
                        $(".float-success").html("An error ocurred while donating. Please check your network and try again.");
                        $(".float-success").fadeIn().animate({ 
                            bottom: "+=200px",
                        }, 1000 );

                        setTimeout(function() {
                            $(".float-success").animate({ 
                                bottom: "-=200px",
                            }, 1000 ).fadeOut();
                        }, 4000);
                        
                        $("#subscribe__ button").prop('disabled', false).html("Donate with Card");
                    }          
                });

            },
            onClose: function () {
                //when the user close the payment modal
                //pop up notification
                $(".float-success").html("Transaction cancelled");
                $(".float-success").fadeIn().animate({ 
                    bottom: "+=200px",
                }, 1000 );

                setTimeout(function() {
                    $(".float-success").animate({ 
                        bottom: "-=200px",
                    }, 1000 ).fadeOut();
                }, 4000);
            }
        });
        handler.openIframe(); //open the paystack's payment modal
    });
})