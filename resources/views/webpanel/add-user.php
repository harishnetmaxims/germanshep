<?php
session_start();
include 'include/dbconnection.php';
$uname = mysqli_real_escape_string($con, $_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

// for updating user info
    if (isset($_POST['update-pro'])) {

        $mem_grp = mysqli_real_escape_string($con, $_POST["mem_grp"]);
        $first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
        $address = mysqli_real_escape_string($con, $_POST["address"]);
        $directions = mysqli_real_escape_string($con, $_POST["directions"]);
        $current_city = mysqli_real_escape_string($con, $_POST["current_city"]);
        $state = mysqli_real_escape_string($con, $_POST["state"]);
        $zip_code = mysqli_real_escape_string($con, $_POST["zip_code"]);
        $country = mysqli_real_escape_string($con, $_POST["country"]);
        $about_me = mysqli_real_escape_string($con, $_POST["about_me"]);
        $established = mysqli_real_escape_string($con, $_POST["established"]);
        $hours = mysqli_real_escape_string($con, $_POST["hours"]);
        $work_tel = mysqli_real_escape_string($con, $_POST["work_tel"]);
        $cell_tel = mysqli_real_escape_string($con, $_POST["cell_tel"]);
        $personal_website = mysqli_real_escape_string($con, $_POST["personal_website"]);
        $email_address = mysqli_real_escape_string($con, $_POST["email_address"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);
        $user_name = mysqli_real_escape_string($con, $_POST["user_name"]);


//$que="update dp_member_profile set first_name='$first_name', address='$address', directions='$directions', current_city='$current_city', state='$state', zip_code='$zip_code', country='$country', about_me='$about_me', established='$established', hours='$hours', work_tel='$work_tel', cell_tel='$cell_tel', personal_website='$personal_website', email_address='$email_address'";
        $que = "INSERT INTO member_profile (first_name, address, directions, current_city, state, zip_code, country, user_name, about_me, established, hours, work_tel, cell_tel, personal_website, email_address, password,user_group) VALUES ('$first_name','$address','$directions','$current_city','$state','$zip_code','$country','$user_name','$about_me','$established','$hours','$work_tel','$cell_tel','$personal_website','$email_address',MD5('$password'),'$mem_grp')";


//print_r($que);
//exit();
        $query = mysqli_query($con, $que) or die(mysqli_error($con));
//print_r($query);
//exit();
        $_SESSION['msg'] = "Profile Updated successfully";
        $extra = "manage-users.php";
        echo "<script>window.location.href='" . $extra . "'</script>";
        exit();
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Admin | Add User</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
    </head>

    <body>

    <section id="container">
        <?php
        include 'include/header.php';
        include 'include/side.php';
        ?>


        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> <?php echo $row['fname']; ?>'s Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>


                            <form class="form-horizontal style-form" name="form1" method="post" action=""
                                  onSubmit="return valid();">
                                <p style="color:#F00"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Register
                                        as:</label>
                                    <div class="col-sm-10"><select class="form-control" name="mem_grp">
                                            <option value="">Please Select an Option</option>
                                            <option value="member">Member</option>
                                            <option value="breeder">Breeder</option>
                                            <option value="admin">Owner</option>
                                        </select></div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"
                                           style="padding-left:40px;">Gender:</label>
                                    <div class="col-sm-10"><select class="form-control" name="gender">
                                            <option value="">Please Select an Option</option>
                                            <option value="member">Male</option>
                                            <option value="breeder">Female</option>
                                        </select></div>
                                </div>


                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Name:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="first_name"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Address:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="address"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Directions:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="directions"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">City:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="current_city"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">State:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="state"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Zip Code:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="zip_code"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Country:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="country"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">About Us:</label>
                                    <div class="col-sm-10"><textarea class="form-control" style="padding: 3px;"
                                                                     class="form-control" name="about_me"
                                                                     value=""></textarea></div>
                                </div>


                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Established Date:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="established"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Operating Hours:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="hours"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Work Telephone:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="work_tel"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Cell Telephone:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="cell_tel"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Our Website:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                                  name="personal_website" value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Email:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="email_address"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Password:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="password"
                                                                  value=""></div>
                                </div>


                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Registration Date </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="regdate"
                                               value="<?php echo $row['date_created']; ?>">
                                    </div>
                                </div>


                                <div style="margin-left:100px;">
                                    <input type="submit" name="update-pro" value="Update" class="btn btn-theme"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </section>
    </section>

    <?php
    include 'include/footer.php';
    ?>
    </body>
    </html>
<?php } ?>
