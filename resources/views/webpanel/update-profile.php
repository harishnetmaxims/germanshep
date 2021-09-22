<?php
session_start();
include 'include/dbconnection.php';
$con = getConnection();
$uname = $_GET["uid"];
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
    exit();
}

// for updating user info
if (isset($_POST['update-pro'])) {
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
    $user_name = mysqli_real_escape_string($con, $_POST["user_name"]);
    $account_type = mysqli_real_escape_string($con, $_POST["account_type"]);

    $que = "update member_profile set first_name='$first_name', address='$address', directions='$directions', current_city='$current_city', user_name='$user_name', state='$state', zip_code='$zip_code', country='$country', about_me='$about_me', established='$established', hours='$hours', work_tel='$work_tel', cell_tel='$cell_tel', personal_website='$personal_website', email_address='$email_address', account_type='$account_type' where user_id = '$uname'";
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

$userdetail = "Select * from member_profile where user_id = '$uname'";
$uresultdetail = mysqli_query($con, $userdetail);
$userdet = mysqli_fetch_assoc($uresultdetail);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Update Profile</title>
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

    <?php $ret = mysqli_query($con, "select * from member_profile where user_id='" . $uname . "'");
    while ($row = mysqli_fetch_array($ret))

    {
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


                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Name:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="first_name"
                                                              value="<?php echo $userdet["first_name"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Address:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="address"
                                                              value="<?php echo $userdet["address"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Directions:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="directions"
                                                              value="<?php echo $userdet["directions"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">City:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="current_city"
                                                              value="<?php echo $userdet["current_city"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">State:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="state"
                                                              value="<?php echo $userdet["state"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Zip Code:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="zip_code"
                                                              value="<?php echo $userdet["zip_code"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Country:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="country"
                                                              value="<?php echo $userdet["country"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">User Name</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="user_name"
                                                              value="<?php echo $userdet["user_name"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">About Us:</label>
                                <div class="col-sm-10"><textarea class="form-control" style="padding: 3px;"
                                                                 name="about_me"
                                                                 value=""><?php echo $userdet["about_me"]; ?></textarea>
                                </div>
                            </div>


                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Established Date:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="established"
                                                              value="<?php echo $userdet["established"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Operating Hours:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="hours"
                                                              value="<?php echo $userdet["hours"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Work Telephone:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="work_tel"
                                                              value="<?php echo $userdet["work_tel"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Cell Telephone:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="cell_tel"
                                                              value="<?php echo $userdet["cell_tel"]; ?>"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Our Website:</label>
                                <div class="col-sm-10"><input class="form-control" type="text"
                                                              name="personal_website"
                                                              value="<?php echo $userdet["personal_website"]; ?>">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Email:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="email_address"
                                                              value="<?php echo $userdet["email_address"]; ?>">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Title:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="account_type" id="account_type">
                                        <option value="standard" <? if ($userdet["account_type"] === 'standard') { ?> selected<? } ?>>
                                            Standard
                                        </option>
                                        <option value="moderator" <? if ($userdet["account_type"] === 'moderator') { ?> selected<? } ?>>
                                            Moderator
                                        </option>
                                        <option value="admin" <? if ($userdet["account_type"] === 'admin') { ?> selected<? } ?>>
                                            Admin
                                        </option>
                                    </select>
                                    <?php /*?> <input class="form-control" type="text" name="account_type" value="<?php echo $userdet["account_type"]; ?>"><?php */
                                    ?></div>
                            </div>


                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Registration Date </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="regdate"
                                           value="<?php echo $row['date_created']; ?>">
                                </div>
                            </div>


                            <div style="margin-left:100px;">
                                <input type="submit" name="update-pro" value="Update" class="btn btn-theme">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <a href="manage-users.php?id=<?php echo $row['user_id']; ?>">
                                    <button type="button" class="btn btn-theme"
                                            onClick="return confirm('Are you sure you want to delete user <?php echo $row['user_name']; ?>');">
                                        Delete User
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
    </section>
</section>

<?php
include 'include/footer.php';
?>
</body>
</html>
