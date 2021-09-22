<?php
session_start();
include 'include/dbconnection.php';
$uname = mysqli_real_escape_string($con, $_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['video_upload'])) {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $tags = mysqli_real_escape_string($con, $_POST['tags']);
        $channel_id = mysqli_real_escape_string($con, $_POST['channel']);
        $sub_channel_id = mysqli_real_escape_string($con, $_POST['subchannel']);
        $uname = mysqli_real_escape_string($con, $_POST['user']);
        $u_id = mysqli_real_escape_string($con, $_POST['uid']);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $fileext = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        $ext = end((explode(".", $image)));
        $uid = intval($_GET['uid']);
        move_uploaded_file($image_tmp, "../uploads/$image");


        $que = "INSERT INTO dp_videos (user_id, title, description, tags, channel_id, sub_channel_id, video_id, type, approved) VALUES ('$u_id','$title','$description','$tags','$channel_id','$sub_channel_id','$fileext','$ext','pendingdelete')";
//print_r($que);
//exit();
        $query = mysqli_query($con, $que);
        $_SESSION['msg'] = "Page Updated successfully";
        $extra = "manage-video.php";
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

        <title>Admin | Update Profile</title>
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
                <h3><i class="fa fa-angle-right"></i> <?php echo $row['fname']; ?>'s Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>


                            <form name="form_upload" action="" method="post" enctype="multipart/form-data">
                                <ul>

                                    <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                                    <input type="hidden" name="uid" value='<?php echo $_SESSION['user_id']; ?>'>

                                    <li><strong>Title:</strong>
                                        <br>
                                        <input class="input form-control" name="title" type="text" value="">
                                    </li>

                                    <li><strong>Description:</strong>
                                        <br>
                                        <textarea class="input form-control summernote" name="description"
                                                  value=""></textarea>
                                    </li>

                                    <li><strong>Tags:</strong>
                                        <br>
                                        <input class="input form-control" name="tags" type="text" value="">
                                        <div class="upload-video-tags">Enter tag words - more than 1 word, separated by
                                            spaces - (NO COMMAS).
                                            <br> Tags are keywords used to describe your media.
                                        </div>
                                    </li>

                                    <li><strong>Select Category:</strong>
                                        <br>
                                        <select id="category" class="input form-control" size="1" name="channel">
                                            <option value="">Select Category</option>
                                            <?php
                                            $sqlc = "Select * from  channels";
                                            $resultc = mysqli_query($con, $sqlc);
                                            if (mysqli_num_rows($resultc) > 0) {
                                                while ($rowcat = mysqli_fetch_assoc($resultc)) {
                                                    ?>
                                                    <option value="<?php echo $rowcat["channel_id"] ?>"><?php echo $rowcat["channel_name"] ?></option>
                                                <?php }
                                            } ?>
                                        </select></li>

                                    <li><strong>Select SubCategory:</strong>
                                        <br>
                                        <select id="sub_category" class="input form-control" value="" size="1"
                                                name="subchannel">

                                        </select></li>

                                    <li><strong>Video:</strong><br>
                                        <input type="file" name="image" value="" class="input form-control"><br>


                                    </li>


                                    <li>
                                        <!--<div id="options"><a style="cursor:pointer;">Show Optional Info</a>, or</div>-->
                                        <!--<br>-->
                                        <div class="submit">
                                            <input type="submit" class="yelsubmit" value="Continue to Upload >>"
                                                   name="video_upload">
                                        </div>
                                    </li>


                                </ul>
                            </form>


                        </div>
                    </div>
                </div>
            </section>

        </section>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#category').on('change', function () {
          var category_id = this.value;
          $.ajax({
            url: "../function/get_subcat.php",
            type: "POST",
            data: {
              category_id: category_id
            },
            cache: false,
            success: function (dataResult) {
              $("#sub_category").html(dataResult);
            }
          });


        });
      });
    </script>


    <?php
    include 'include/footer.php';
    ?>

    </body>
    </html>
<?php } ?>
