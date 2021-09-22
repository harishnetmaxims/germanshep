<?php
session_start();
include 'include/dbconnection.php';
$con = getConnection();
$uname = intval($_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

// for Inser Blog info
    if (isset($_POST['blog_post'])) {
        $title = mysqli_real_escape_string($con, $_POST['group_name']);
        $description = addslashes($_POST['group_description']);
        $private_pub = $_POST['private_pub'];
        $admin_id = $_SESSION['id'];
        $todays_date = date('Y-m-d H:i:s');


        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $uid = intval($_GET['uid']);
        move_uploaded_file($image_tmp, "../uploads/thumbs/$image");


        $que = "INSERT INTO group_profile (group_name, public_private, todays_date, group_description, admin_id, image_pro) 
			VALUES ('$title','$private_pub','$todays_date','$description','$admin_id','$image')";

        $query = mysqli_query($con, $que);
        $_SESSION['msg'] = "Breeder Updated successfully";
        $extra = "manage-breeder.php";
        echo "<script>window.location.href='" . $extra . "'</script>";
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

        <title>Admin | Update Breeder</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <link href="assets/editor/css/summernote.css" rel="stylesheet">
        <link href="assets/editor/css/font-awesome.css" rel="stylesheet">
    </head>

    <body>

    <section id="container">
        <?php
        include 'include/header.php';
        include 'include/side.php';
        ?>


        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Breeder's Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>


                            <form method="post" name="blog_form" id="blog_form" action="" enctype="multipart/form-data">

                                <ul>
                                    <input type="hidden" name="uid" value='<?php echo $blogdet["admin_id"]; ?>'>
                                    <li><strong>Title:</strong><br>
                                        <input class="input form-control" type="text" name="group_name" value=""></li>

                                    <li><strong>Public / Private:</strong><br>
                                        <select class="input form-control" name="private_pub">
                                            <option value="private">Private</option>
                                            <option value="public" selected="selected">Public</option>
                                        </select></li>


                                    <li><strong>Description:</strong><br>
                                        <textarea class="form-control summernote" name="group_description"
                                                  value=""></textarea>
                                    </li>


                                    <li><strong>Breeder Image:</strong><br>
                                        <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Uplaod
                                            Breeder Image</label>
                                        <input type="file" id="imageUpload" accept="image/*" style="display: none"
                                               name="image"><br/>
                                        <img src="" id="profile-img-tag" width="100px"/>

                                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                        <script type="text/javascript">
                                          function readURL(input) {
                                            if (input.files && input.files[0]) {
                                              var reader = new FileReader();

                                              reader.onload = function (e) {
                                                $('#profile-img-tag').attr('src', e.target.result);
                                              }
                                              reader.readAsDataURL(input.files[0]);
                                            }
                                          }

                                          $("#imageUpload").change(function () {
                                            readURL(this);
                                          });
                                        </script>
                                    </li>
                                    </br>


                                    <li>
                                        <input type="submit" class="btn btn-theme" value="Addd Breeder"
                                               name="blog_post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                                    </li>

                                </ul>
                            </form>


                        </div>
                    </div>
                </div>
            </section>

            <?php
            include 'include/footer.php';
            ?>
        </section>
    </section>


    </body>
    </html>
<?php } ?>
