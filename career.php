<?php
require_once "db/config.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Our Careers | Greenworld Touching Lives Initiative | We are the Nigerian body of a global network of charity organizations committed to touching lives for positive transformation." name="description">
    <meta content="Greenworld Touching Lives Initiative, Grant, Greenworld Careers, Ibadan, Oyo" name="keywords">
    <meta content="Kayode Shobalaje" name="author">
    <title>Career | Touching Lives Initiative</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/font.css">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/responsive.css">

    <!-- site icon -->
    <link rel="shortcut icon" type="image/png" href="src/img/greenworld_icon.png">

    <meta property="og:image" content="https://touchingliveshere.com/1200.jpg">
    <meta name="twitter:title" content="@greenworld_initiatives">
    <meta name="twitter:site" content="@greenworld_initiatives">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Our Careers | Welcome to Greenworld Touching Lives Initiatives">
    <meta name="twitter:image" content="https://touchingliveshere.com/1200.jpg">
</head>
<body>
    <div class="heder">
        <div class="row">
            <div class="col-md-3">
                <a href="./"><img src="src/img/greenworld_logo.png" class="logo" alt=""></a>
            </div>
            <div class="col-md-6">
                <ul class="menut">
                    <li><a href="./">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="news">News</a></li>
                    <li><a href="media">Media</a></li>
                    <li><a href="#" class="active">Career</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="indf">
                    <small class="text-muted">Want to enquire? Talk to us</small>
                    <a href="#"><h5>support@touchingliveshere.com</h5></a>
                </div>
            </div>
        </div>

        <div class="mlpjd grtplo">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h1 class="big_text_slider txt-curve text-left">Open Career Roles</h1>
                        <h3 class="text-muted skal mt-4 text-left">We work fast, grow fast, and build fast. Life at Greenworld Touching Lives Initiatives at 200 miles an hour in fast-forward motion, and we focus on making an impact from day one. Are you ready?</h3>
                    </div>
                    <div class="col-md-7">
                        <img src="src/img/vacacy_site_image.png" class="ghsooo_don max100" alt="">
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <div class="grekko">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <h4 class="ic_kflls heading_hos text-left">Instructions</h4>
                    <p class="body_txt text-muted">Please read thoroughly all the requirements. Only qualified candidates will be contacted for interviews.</p>
                    <div class="mt-2">&nbsp;</div>


                    <h4 class="ic_kflls heading_hos text-left">Requirements</h4>
                    <p class="body_txt text-muted">The Regional, State, LG and Zonal Supervisor Applicants must satisfy the requirements below:</p>
                    <div class="mt-2">&nbsp;</div>

                    <section class="posjkd mt-4">
                        <ul class="skljj">
                            <li>Must have a verifiable business location.</li>
                            <li>Must possess a Nigeria Corporate Affairs Commission business certificate.</li>
                            <li>Must have completed the mandatory one year NYSC service.</li>
                            <li>Must have lived in Nigeria for the past 3 years.</li>
                            <li>Must have a clean criminal record within the past 10 years.</li>
                        </ul>
                    </section>

                    <div class="mt-4">&nbsp;</div>
                    <div class="mt-4">&nbsp;</div>

                </div>
                <div class="col-md-8">
                    <h3 class="heading_xx ffl gg_xx_ tsmm text-center">Join us at Greenworld Initiatives <div>Apply Here.</div></h3>
                    <!-- employment form -->
                    <div class="pd_30">
                        <form action="#" method="post" id="employement____">
                            <input type="text" name="name" id="name" placeholder="Full Name* (Surname first)" class="special_" required>

                            <div class="row">
                                <div class="col-md-6">
                                    <select name="gender" id="gender" class="special_" required>
                                        <option value="">Select Gender*</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="none">I prefer not to say</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted" style="font-size: 10px !important; margin-left: 17px !important">Date of Birth*</small>
                                    <input type="date" name="dob" id="dob" placeholder="Date of Birth*" class="special_" style="margin-top: -20px !important;" required>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <small class="text-muted" id="state_label" style="font-size: 10px !important; margin-left: 17px !important">State of Residence*</small>
                                    <select name="state" id="state" class="special_" required>
                                        <option value="">State of Residence*</option>
                                        <?php
                                        $q=mysqli_query($con,"SELECT * FROM states_lga WHERE seq=1");
                                        $n=mysqli_num_rows($q);

                                        if ($n>0){
                                            while($f=mysqli_fetch_assoc($q)){
                                                echo '<option value="'.$f['code'].'">'.$f['descrip'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted" id="lga_label" style="font-size: 10px !important; margin-left: 17px !important">LGA of Residence*</small>
                                    <select name="lga" id="lga" class="special_" required>
                                        <option value="">LGA of Residence*</option>
                                    </select>
                                    <small id="lga_loading" class="text-muted" style="font-size: 9px !important; display: block; margin-top: -15px !important;margin-bottom: 20px !important;"></small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="phone" id="phone" placeholder="Phone Number*" class="special_" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" id="email" placeholder="Email Address*" class="special_" required>
                                </div>
                            </div>

                            <div class="mt-2"></div>

                            <input type="text" name="nin" id="nin" placeholder="NIN Number*" class="special_" required>

                            <small class="text-muted" id="state_label" style="font-size: 10px !important; margin-left: 17px !important">(For state and regional roles)</small>
                            <input type="text" name="cac" id="cac" placeholder="CAC Number" class="special_">

                            <div class="mt-1"></div>

                            <small class="text-muted" id="state_label" style="font-size: 10px !important; margin-left: 17px !important">(For state and regional roles)</small>
                            <textarea name="address" id="address" placeholder="Business Adress" cols="30" rows="7" class="special_"></textarea>

                            <section>Did you apply for the grant?*</section>
                            <div class="mt-3 radio-toolbar">
                                <input type="radio" id="radio1" name="apply_grant" value="yes" checked>
                                <label for="radio1">Yes, I did.</label>

                                <input type="radio" id="radio2" name="apply_grant" value="no">
                                <label for="radio2">No, I didn't.</label>

                            </div>

                            <div class="clearfix"></div>
                            <div class="mt-2">&nbsp;</div>

                            <button class="mt-4 djug" type="submit">Apply Now</button>
                        </form>
                    </div>
                    <!-- employment form -->
                </div>
            </div>

        </div>
    </div>


    <div class="difjfkgsdfmkl">
        <div class="container">
            <form action="#" method="post" id="subscribe__">
                <div class="row">
                    <div class="col-md-5">
                        <h4 class="jdfdd txt-bold">
                            Receive up-to-date Information
                        </h4>
                        <section class="sjkfssd text-muted fhh">We have alot planned for the future</section>
                    </div>
                    <div class="col-md-5 hjlpq">
                        <input type="email" name="s_email" id="s_email" class="djlaa" placeholder="Email Address">
                    </div>
                    <div class="col-md-2 hjlpq">
                        <button class="djlaa" type="submit">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="scroll">
        <div class="m-scroll">
            <span><img src="src/img/s/UN0270321.jpg" ></span>
            <span><img src="src/img/s/adfdfdd.jpg"></span>
            <span><img src="src/img/s/ieoow.jpg"></span>
            <span><img src="src/img/s/snyu22.jpg"></span>
            <span><img src="src/img/s/ieu.jpg"></span>
            <span><img src="src/img/s/kooe.jpg"></span>
            <span><img src="src/img/s/opee.jpg"></span>
            <span><img src="src/img/s/1qw.jpg"></span>
            <span><img src="src/img/s/a11.jpg"></span>
            <span><img src="src/img/s/b23.jpg"></span>
            <span><img src="src/img/s/ls100.jpg"></span>
            <span><img src="src/img/s/pppo1.jpg"></span>
        </div>
    </div>


    <div class="footer">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-3">
                    <a href="#"><img src="src/img/greenworld_logo.png" class="logo_" alt=""></a>
                </div>
                <div class="col-md-9">

                    <div class="row">
                        <div class="col-md-2 mb-4">
                            <small class="text-muted mnijk">Our Menu</small>
                            <ul class="menut foot-menu">
                                <li><a href="./">Home</a></li>
                                <li><a href="about">About</a></li>
                                <li><a href="news">News</a></li>
                                <li><a href="media">Media</a></li>
                                <li><a href="contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 mb-4">
                            <small class="text-muted mnijk">Others</small>
                            <ul class="menut foot-menu">
                                <li><a href="grant">Our Grant</a></li>
                                <li><a href="career" class="active">Career</a></li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="src/img/envelope.png" class="djknmnfk" alt="">
                                        </div>
                                        <div class="col-md-10 bvdglkd">
                                            <small class="text-muted">Email Address</small>
                                            <section>support@touchingliveshere.com</section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <!-- <div class="row">
                                        <div class="col-md-2">
                                            <img src="src/img/phone-call.png" class="djknmnfk" alt="">
                                        </div>
                                        <div class="col-md-10 bvdglkd">
                                            <small class="text-muted">Phone Number</small>
                                            <section>+234 706 091 3596</section>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-md-12 mt-4 mb-4 msjkops">
                                    <div class="text-left mt-3">
                                        <small class="text-muted">Social Media Accounts</small>
                                    </div>
                                    <ul class="social_footer">
                                        <li><a href="#"><img src="src/img/facebook.png" alt=""> Facebook</a></li>
                                        <li><a href="#"><img src="src/img/twitter.png" alt=""> Twitter</a></li>
                                        <li><a href="#"><img src="src/img/whatsapp.png" alt=""> Whatsapp</a></li>
                                        <li><a href="https://www.instagram.com/d3liberateintentions" target="_blank"><img src="src/img/instagram.png" alt=""> Instagram</a></li>
                                        <li><small>@greenworld_touching</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 mb-1 text-center">
                <small class="text-muted">Copyright &copy; <?= Date('Y') ?> <strong>Greenworld Touching Lives Initiatives</strong> - All Rights Reserved.</small>
            </div>
        </div>
    </div>
    

    <div class="mobile-menu">
        <a href="#"><img src="src/img/greenworld_logo_white.png" class="logo inv" alt=""></a>
        <a href="#"><img src="src/img/circle-xmark.png" class="close" alt=""></a>

        <ul class="menut mob-menu">
            <li><a href="./">Home</a></li>
            <li><a href="about">About</a></li>
            <li><a href="news">News</a></li>
            <li><a href="media">Media</a></li>
            <li><a href="#" class="active">Career</a></li>
            <li><a href="contact">Contact</a></li>
        </ul>
    </div>

    <a href="javascript:void(0)" class="skoiua">
        <img src="src/img/bars-staggered.png" alt="">
    </a>

    <div class="float-success"></div>


<!--   Core JS Files   -->
<script src="src/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="src/js/index.js" type="text/javascript"></script>
</body>
</html>