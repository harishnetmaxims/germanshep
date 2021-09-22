<?php
session_start();
include('include/dbconnection.php');
$vid_id = intval($_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
// for Inser video info
    if (isset($_POST['video_upload'])) {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $tags = mysqli_real_escape_string($con, $_POST['tags']);
        $channel_id = mysqli_real_escape_string($con, $_POST['channel']);
        $sub_channel_id = mysqli_real_escape_string($con, $_POST['subchannel']);
        $uname = mysqli_real_escape_string($con, $_POST['user']);
        $u_id = mysqli_real_escape_string($con, $_POST['uid']);
        $approved = mysqli_real_escape_string($con, $_POST['approved']);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $fileext = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        $ext = end((explode(".", $image)));

        move_uploaded_file($image_tmp, "../uploads/$image");


        if ((!($_FILES['image']['name']))) /* If there Is No file Selected*/ {
            $que = "update videos set user_id='$u_id', title='$title', description='$description', tags='$tags', channel_id='$channel_id', sub_channel_id='$sub_channel_id', approved='$approved' where indexer = '$vid_id'";


        } else /* If file is  Selected*/ {
            $que = "update videos set user_id='$u_id', title='$title', description='$description', tags='$tags', channel_id='$channel_id', sub_channel_id='$sub_channel_id', video_id='$fileext', type='$ext', approved='$approved' where indexer = '$vid_id'";


        }


//print_r($que);
//exit();
        $query = mysqli_query($con, $que);
        $_SESSION['msg'] = "Page Updated successfully";
        $extra = "manage-video.php";
        echo "<script>window.location.href='" . $extra . "'</script>";
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

    <title>Admin | Update Blog</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/css/froala_editor.pkgd.min.css" rel="stylesheet"
          type="text/css"/>

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
            <h3><i class="fa fa-angle-right"></i> <?php echo $row['title']; ?>'s Information</h3>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>

                        <?php
                        $sqlvid = "Select * from videos where indexer = '$vid_id'";
                        $resultvid = mysqli_query($con, $sqlvid);
                        $viddet = mysqli_fetch_assoc($resultvid);
                        ?>


                        <form name="form_upload" action="" method="post" enctype="multipart/form-data">
                            <ul>

                                <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                                <input type="hidden" name="uid" value='<?php echo $_SESSION['user_id']; ?>'>

                                <li><strong>Title:</strong>
                                    <br>
                                    <input class="input form-control" name="title" type="text"
                                           value="<?php echo $viddet["title"] ?>">
                                </li>

                                <li><strong>Description:</strong>
                                    <br>
                                    <textarea class="input form-control summernote" name="description"
                                              value=""><?php echo $viddet["description"] ?></textarea>
                                </li>

                                <li><strong>Tags:</strong>
                                    <br>
                                    <input class="input form-control" name="tags" type="text"
                                           value="<?php echo $viddet["tags"] ?>">
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
                                        $sqlc = "Select * from channels";
                                        $resultc = mysqli_query($con, $sqlc);
                                        if (mysqli_num_rows($resultc) > 0) {
                                            while ($rowcat = mysqli_fetch_assoc($resultc)) {
                                                ?>
                                                <option value="<?php echo $rowcat["channel_id"] ?>" <?php if ($viddet["channel_id"] == $rowcat["channel_id"]) { ?> selected="selected" <?php } ?>><?php echo $rowcat["channel_name"] ?></option>
                                            <?php }
                                        } ?>
                                    </select></li>

                                <li><strong>Select SubCategory:</strong>
                                    <br>
                                    <select id="sub_category" class="input form-control" value="" size="1"
                                            name="subchannel">
                                        <?php
                                        $sqlcs = "Select * from sub_channels";
                                        $resultcs = mysqli_query($con, $sqlcs);
                                        if (mysqli_num_rows($resultcs) > 0) {
                                            while ($rowcats = mysqli_fetch_assoc($resultcs)) {
                                                ?>
                                                <option value="<?php echo $rowcats["sub_channel_id"]; ?>" <?php if ($viddet["sub_channel_id"] == $rowcats["sub_channel_id"]) { ?> selected="selected" <?php } ?>><?php echo $rowcats["sub_channel_name"]; ?></option>
                                            <?php }
                                        } ?>
                                    </select></li>

                                <li><strong>Approval:</strong><br>
                                    <select class="input form-control" name="approved">
                                        <option value="yes">Yes</option>
                                        <option value="pendingdelete" selected="selected">Pendingdelete</option>
                                    </select></li>


                                <li><strong>Video:</strong><br>
                                    <?php echo $viddet["video_id"]; ?>.<?php echo $viddet["type"]; ?>
                                    <input type="file" name="image" value="" class="input form-control"/><br>


                                </li>


                                <!-- <span id="showuploadoptions">
                      <li><h1>Optional Info</h1></li>
                      <li><strong>Dog Regcode (i.e. 2138739):</strong><br>
                        <input class="input form-control" name="pd" type="text" value=""></li>

                <li><strong>Location recorded:</strong><br>
                        <input class="input form-control" name="location_recorded" type="text" value=""></li>

                    <li><strong>Allow comments:</strong><br>
                        <select class="input form-control" size="1" name="allow_comments">
                              <option value="yes" selected="selected">Yes</option>
                              <option value="no">No</option>
                            </select>
                        </li>

                        <li><strong>Allow embedding:</strong><br>
                          <select class="input form-control" size="1" name="allow_embedding">
                            <option value="yes" selected="selected">Yes</option>
                            <option value="no">No</option>
                          </select>
                        </li>

                        <li><strong>Public / Private:</strong><br>
                          <select class="input form-control" size="1" name="public_private">
                            <option value="public" selected="selected">Public</option>
                            <option value="private">Private</option>
                          </select>
                        </li>
                    </span> -->

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

<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>
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

