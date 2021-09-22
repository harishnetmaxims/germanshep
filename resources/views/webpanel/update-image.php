<?php
session_start();
include('include/dbconnection.php');
$con = getConnection();
$img_id = intval($_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
    exit();
}

if (isset($_POST['upload_button'])) {
    $uname = mysqli_real_escape_string($con, $_POST['user']);
    $u_id = mysqli_real_escape_string($con, $_POST['uid']);
    $album_id = mysqli_real_escape_string($con, $_POST['album_id']);
    $n_array = $_FILES['file_array']['name'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $uid = intval($_GET['uid']);
    move_uploaded_file($image_tmp, "../addons/albums/images/$image");

    $icat = "Select * from image_galleries where gallery_id = '$album_id'";
    $icatresult = mysqli_query($con, $icat);
    $iatdetail = mysqli_fetch_assoc($icatresult);
    $iatname = $iatdetail["gallery_name"];
    $iatdesc = $iatdetail["gallery_description"];
    $iattag = $iatdetail["gallery_tags"];

    //print_r($query);
    //exit();

//$que="update dp_images set user_id='$u_id', gallery_id='$album_id', gallery_name='$iatname', image_id='$image', description='$iatdesc', tags='$iattag' where indexer = '$img_id'";
    if ((!($_FILES['image']['name']))) /* If there Is No file Selected*/ {
        $que = "update images set user_id='$u_id', gallery_id='$album_id', gallery_name='$iatname', description='$iatdesc', tags='$iattag' where indexer = '$img_id'";

    } else /* If file is  Selected*/ {
        $que = "update images set user_id='$u_id', gallery_id='$album_id', gallery_name='$iatname', image_id='$image', description='$iatdesc', tags='$iattag' where indexer = '$img_id'";

    }

//print_r($que);
//exit();
    $query = mysqli_query($con, $que);
    $_SESSION['msg'] = "Page Updated successfully";
    $extra = "manage-picture.php";
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

    <title>Admin | Update Blog</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/css/froala_editor.pkgd.min.css" rel="stylesheet"
          type="text/css"/>
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
                        $sqlimg = "Select * from images where indexer = '$img_id'";
                        $resultimg = mysqli_query($con, $sqlimg);
                        $imgdet = mysqli_fetch_assoc($resultimg);
                        ?>


                        <form method="post" action="" enctype="multipart/form-data">
                            <ul>
                                <li><h2>Step 1: Select a photo album</h2></li>
                                <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                                <input type="hidden" name="uid" value='<?php echo $_SESSION['user_id']; ?>'>
                                <li><strong>Your Albums:</strong> <em>Select from one of your albums.</em><br>
                                    <select name="album_id" size="1" tabindex="1" class="input form-control" value="">
                                        <?php
                                        $sqlcc = "Select * from image_galleries group by gallery_name";
                                        $resultcc = mysqli_query($con, $sqlcc);
                                        if (mysqli_num_rows($resultcc) > 0) {
                                            while ($rowcat = mysqli_fetch_assoc($resultcc)) {
                                                ?>
                                                <option value="<?php echo $rowcat["gallery_id"] ?>" <?php if ($imgdet["gallery_id"] == $rowcat["gallery_id"]) { ?> selected="selected" <?php } ?>><?php echo $rowcat["gallery_name"] ?></option>
                                            <?php }
                                        } ?>
                                    </select><br>
                                </li>


                                <span id="hidenewalbum"><li></li></span>

                                <li><h2>Step 2: Select your image files</h2></li>

                                <li><strong>Please Note: Image files must be jpg, gif, or png - Min Image Size: 5kb -
                                        Max Image Size: 2000kb's.</strong></li>

                                <input type="file" name="image" id="profile-img" class="input form-control"/><br>
                                <img src="../addons/albums/images/<?php echo $imgdet["image_id"] ?>"
                                     id="profile-img-tag" width="100px" value="<?php echo $imgdet["image_id"] ?>"/>

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

                                  $("#profile-img").change(function () {
                                    readURL(this);
                                  });
                                </script>
                                </li>

                                <li class="submit">
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
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>

<script>
  new FroalaEditor('#froala-editor', {
    // Set the file upload URL.
    imageUploadURL: 'assets/img/page-edit/upload_image.php',

    imageUploadParams: {
      id: 'my_editor'
    }
  })
</script>

</body>
</html>

