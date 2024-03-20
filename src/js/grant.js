$(function(){

    $(document).on('submit','#grant__', function(e){
        e.preventDefault();

        var handler = PaystackPop.setup({ 
            key: 'pk_live_777fa33d73b6a5c648f70542b0c35cf702facf24', //put your public key here
            email: $("#email").val(), //put your customer's email here
            amount: 150000, //amount the customer is supposed to pay // 150000
            metadata: {
                custom_fields: [
                    {
                        display_name: "Greenworld Customer",
                        variable_name: "mobile_number",
                        value: $("#phone_number").val() //customer's mobile number
                    }
                ]
            },
            callback: function (response) {
                var data = new FormData();
                data.append("name", $("#name").val());
                data.append("gender", $("#gender").val());
                data.append("email", $("#email").val());
                data.append("dob", $("#dob").val());
                data.append("phone_number", $("#phone_number").val());
                data.append("state", $("#state").val());
                data.append("lga", $("#lga").val());
                data.append("amount", $("#amount").val());
                data.append("bank_name", $("#bank_name").val());
                data.append("acc_num", $("#acc_num").val());
                data.append("account_name", $("#account_name").val());
                data.append("msg", $("#msg").val());
                data.append("reference", response.reference);

                $.ajax({
                    url: "./db/grant.php",
                    type: "POST",
                    data:  data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend : function(){
                        $("#grant__ button").prop('disabled', true).html("please wait..");
                    },
                    success: function(data) {
                        var data_ = jQuery.trim(data);
                        // console.log("response", data_);
                        var obj = JSON.parse(data_);
                        if (obj.status=="success"){
                            
                            $("#grant__ button").prop('disabled', false).html("Apply for Grant");
                            $("#grant__ input").val("");
                            $("#grant__ select").val("");
                            $("#grant__ textarea").val("");

                            //pop up notification
                            $(".float-success").html("Grant application successful.");
                            $(".float-success").fadeIn().animate({ 
                                bottom: "+=200px",
                            }, 1000 );

                            setTimeout(function() {
                                $(".float-success").animate({ 
                                    bottom: "-=200px",
                                }, 1000 ).fadeOut();
                            }, 4000);
                            
                        } else{
                            
                            $("#grant__ button").prop('disabled', false).html("Apply for Grant");
                            // $("#grant__ input").val("");

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
                        
                        $("#subscribe__ button").prop('disabled', false).html("Apply for Grant");
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

    $(document).on('keyup', '#acc_num', function(e){

    });
})