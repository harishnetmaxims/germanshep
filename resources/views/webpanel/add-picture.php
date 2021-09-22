<?php
session_start();
include 'include/dbconnection.php';
$con = getConnection();
$uname = mysqli_real_escape_string($con, $_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

// for Inser Blog info
    if (isset($_POST['upload_button'])) {
        if (isset($_FILES['file_array'])) {

            $uname = mysqli_real_escape_string($con, $_POST['user']);
            $u_id = mysqli_real_escape_string($con, $_POST['uid']);
            $album_id = mysqli_real_escape_string($con, $_POST['album_id']);
            $n_array = $_FILES['file_array']['name'];
            $tmp_name_array = $_FILES['file_array']['tmp_name'];
            $type_array = $_FILES['file_array']['type'];
            $size_array = $_FILES['file_array']['size'];
            $error_array = $_FILES['file_array']['error'];

            $icat = "Select * from dp_image_galleries where gallery_id = '$album_id'";
            $icatresult = mysqli_query($con, $icat);
            $iatdetail = mysqli_fetch_assoc($icatresult);
            $iatname = $iatdetail["gallery_name"];
            $iatdesc = $iatdetail["gallery_description"];
            $iattag = $iatdetail["gallery_tags"];

            //print_r($query);
            //exit();

            for ($i = 0; $i < count($tmp_name_array); $i++) {
                if (move_uploaded_file($tmp_name_array[$i], "../addons/albums/images/" . $n_array[$i])) {
                    $query = mysqli_query($con, "INSERT INTO dp_images (user_id, gallery_id, gallery_name, image_id, description, tags) VALUES ('$u_id', '$album_id', '$iatname', '$n_array[$i]', '$iatdesc', '$iattag')");


                    echo '<div class="form_message_box">' . $n_array[$i] . '   ' . 'Uploaded Successfully' . '</div>' . '<br>';
                    if ($query) {
                        $_SESSION['msg'] = "Page Updated successfully";
                        $extra = "manage-picture.php";
                        echo "<script>window.location.href='" . $extra . "'</script>";
                    } else {
                        echo 'failed!' . '<br>';
                    }
                }
            }
        }
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


        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> <?php echo $row['fname']; ?>'s Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>


                            <form method="post" action="" enctype="multipart/form-data">
                                <ul>
                                    <li><h2>Step 1: Select or create a photo album</h2></li>
                                    <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                                    <input type="hidden" name="uid" value='<?php echo $_SESSION['user_id']; ?>'>
                                    <li><strong>Your Albums:</strong> <em>Select from one of your albums.</em><br>
                                        <select name="album_id" size="1" tabindex="1" class="input form-control"
                                                value="">
                                            <?php
                                            $sqlcc = "Select * from dp_image_galleries group by gallery_name";
                                            $resultcc = mysqli_query($con, $sqlcc);
                                            if (mysqli_num_rows($resultcc) > 0) {
                                                while ($rowcat = mysqli_fetch_assoc($resultcc)) {
                                                    ?>
                                                    <option value="<?php echo $rowcat["gallery_id"] ?>"><?php echo $rowcat["gallery_name"] ?></option>
                                                <?php }
                                            } ?>
                                        </select><br>
                                    </li>

                                    <li style="margin-bottom:2px;">
                                        <div id="photoalbum">
                                            <a href="#myModal" role="button" class="btn" data-toggle="modal">Create New
                                                Album</a>
                                        </div>
                                    </li>


                                    <span id="hidenewalbum"><li></li></span>

                                    <li><h2>Step 2: Select your image files</h2></li>

                                    <li><strong>Please Note: Image files must be jpg, gif, or png - Min Image Size: 5kb
                                            - Max Image Size: 2000kb's.</strong></li>

                                    <li><input type="file" name="file_array[]" size="50" tabindex="11"
                                               class="special_file input form-control" multiple></li>


                                    <div id="show_upload" style="visibility:hidden">
                                        <p align="center">Please Wait...&nbsp;&nbsp;
                                            <img src="themes/eclipse/images/icons/images_loading.gif"></p>
                                    </div>

                                    <li class="submit" style="width:98%;">
                                        <input type="button" name="reset_button" value="Reset" tabindex="14"
                                               class="button-form">
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="submit" name="upload_button" value="Upload New Image"
                                               class="button-form">
                                    </li>


                                </ul>
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
