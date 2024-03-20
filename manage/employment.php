<?php
require_once "../db/config.php";

//summary
$qsummary=mysqli_query($con, "SELECT
(SELECT COUNT(*) FROM grant_application) as grantCount, 
(SELECT COUNT(*) FROM contact) as contactCount,
(SELECT COUNT(*) FROM employment) as employmentCount,
(SELECT COUNT(*) FROM subscriptions) as subscriptionsCount,
(SELECT SUM(amount) FROM donate) as donateSum");

$fsummary = mysqli_fetch_assoc($qsummary);

//get data
$q="SELECT * FROM employment";
$q__=mysqli_query($con, $q);
$n=mysqli_num_rows($q__);
?>
<!doctype html>
<html>
<head>
    <title>Administrative Platform</title>
    <meta content="Kayode Shobalaje" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/index.css">

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">

    <!-- site icon -->
    <link rel="shortcut icon" type="image/png" href="../src/img/greenworld_icon.png">
</head>
<body>
    <div class="sheader">
        <div class="containerxd">
            <div class="row">
                <div class="col-md-9">
                    <a href="#" class="logo_top"><img src="../src/img/greenworld_logo.png" class="logo" alt=""></a>
                </div>
                <dif class="col-md-3">
                    <div class="pull-right">
                        <a href="#" class="lgbtn">Sign Out</a>
                    </div>
                    <div class="clearfix"></div>
                </dif>
            </div>
        </div>
    </div>

    <div class="in_body">
        
        <div class="row">
            <div class="col-md-3">
                <div class="ccard">
                    <h5>Contact Msgs.</h5>
                    <h1><?= number_format($fsummary['contactCount']) ?></h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ccard">
                    <h5>Grant Apps.</h5>
                    <h1><?= number_format($fsummary['grantCount']) ?></h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ccard">
                    <h5>Subscriptions</h5>
                    <h1><?= number_format($fsummary['subscriptionsCount']) ?></h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ccard">
                    <h5>Employment App.</h5>
                    <h1><?= number_format($fsummary['employmentCount']) ?></h1>
                </div>
            </div>
        </div>



        <div class="row m-t-50">
            <div class="col-md-6">
                <h5 class="dhiop text-muted">Transactions Received</h5>
                <h1 class="dsjbkf">Successful payments from users</h1>
            </div>
            <div class="col-md-3">
                <div class="ccard hjkdooaoa">
                    <h5>Total Grant App Fee.</h5>
                    <h1>&#8358; <?= number_format($fsummary['grantCount'] * 1500) ?></h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ccard hjkdooaoa">
                    <h5>Total Donation.</h5>
                    <h1>&#8358; <?= number_format($fsummary['donateSum']) ?></h1>
                </div>
            </div>
        </div>




        <div class="row m-t-50">
            <div class="col-md-3">
                <section class="menn">Menu</section>
                <ul class="sidebar">
                    <li><a href="dashboard"><i data-feather="aperture"></i> Grant Apps.</a></li>
                    <li><a href="#" class="active"><i data-feather="briefcase"></i> Employment Apps.</a></li>
                    <li><a href="subscriptions"><i data-feather="book"></i> Subscriptions</a></li>
                    <li><a href="donations"><i data-feather="columns"></i> Donations</a></li>
                    <li><a href="contact"><i data-feather="mail"></i> Contact Messages</a></li>
                    <li><a href="#"><i data-feather="navigation"></i> Log Out</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="cardbox">
                    <div class="flex-container">
                        <div class="flex-child">
                            <div class="chipp">
                            <?= $n ?>
                            </div>
                        </div>
                        <div class="flex-child ghgkdosos">
                            <h2 class="djkaia">Employment Applications</h2>
                            <small class="text-muted">List of employments applications received</small>

                        </div>
                        <div class="flex-child">
                            <a href="#" class="but"><i data-feather="arrow-down"></i> Download (CSV)</a>
                        </div>
                    </div>

                    <div class="dh m-t-50 table-responsive">
                        <table class="table bnd table-striped table-borderless" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Phone No.</th>
                                    <th scope="col">Apply4Grant</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    if ($n>0){
                                        $i = 0;
                                        while($f=mysqli_fetch_assoc($q__)){
                                            $i++;
                                            ?>
                                            <tr>
                                                <th><?= $i ?></th>
                                                <td><a href="#" class="linka"><?= $f['name'] ?></a></td>
                                                <td><?= ucwords($f['gender']) ?></td>
                                                <td><?= $f['dob'] ?></td>
                                                <td><?= $f['phone'] ?></td>
                                                <td><span class="bbadge-primary"><?= strtoupper($f['apply_for_grant']) ?></span></td>
                                                <td><?= Date('M d, Y', strtotime($f['created_date'])) ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace();
</script>

<script src="../src/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js" type="text/javascript"></script>

<script>
    $(function(){
        let table = new DataTable('#myTable');
    })
</script>
</body>
</html>