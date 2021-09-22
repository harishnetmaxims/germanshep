<?php
session_start();
include('include/dbconnection.php');
$blog_id = intval($_GET["uid"]);
//Checking session is valid or not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
// for Inser Blog info
    if (isset($_POST['blog_post'])) {
        $title = mysqli_real_escape_string($con, $_POST['group_name']);
        $description = addslashes($_POST['group_description']);
        $private_pub = mysqli_real_escape_string($con, $_POST['private_pub']);
        $admin_id = mysqli_real_escape_string($con, $_POST['uid']);
        $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "../uploads/thumbs/$image");


        if ((!($_FILES['image']['name']))) {
            $que = "update group_owner set group_name='$title', group_description='$description', public_private='$private_pub' where indexer = '$user_id'";

        } else {
            $que = "update group_owner set group_name='$title', group_description='$description', public_private='$private_pub', image_pro='$image' where indexer = '$user_id'";

        }

        $query = mysqli_query($con, $que);
        $_SESSION['msg'] = "Owner Updated successfully";
        $extra = "manage-owner.php";
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

    <title>Admin | Owner </title>
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
            <h3><i class="fa fa-angle-right"></i> Owner's Information</h3>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>

                        <?php
                        $sqlblog = "Select * from group_owner where indexer = '$blog_id'";
                        $resultblog = mysqli_query($con, $sqlblog);
                        $blogdet = mysqli_fetch_assoc($resultblog);
                        ?>
                        <form method="post" name="blog_form" id="blog_form" action="" enctype="multipart/form-data">

                            <ul>
                                <input type="hidden" name="user_id" value='<?php echo $blogdet["indexer"]; ?>'>
                                <input type="hidden" name="uid" value='<?php echo $blogdet["admin_id"]; ?>'>

                                <li><strong>ID:</strong><br>
                                    <input class="input form-control" type="text" name="owner_id"
                                           value="<?php echo utf8_decode($blogdet["owner_id"]); ?>" disabled="disabled">
                                </li>

                                <li><strong>Title:</strong><br>
                                    <input class="input form-control" type="text" name="group_name"
                                           value="<?php echo $blogdet["group_name"]; ?>"></li>

                                <li><strong>Public / Private:</strong><br>
                                    <select class="input form-control" name="private_pub">
                                        <option value="private">Private</option>
                                        <option value="public" selected="selected">Public</option>
                                    </select></li>


                                <li><strong>Description:</strong><br>
                                    <textarea class="form-control summernote" name="group_description"
                                              value=""><?php echo $blogdet["group_description"] ?></textarea>
                                </li>


                                <li><strong>Owner Image:</strong><br>
                                    <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Uplaod Owner
                                        Image</label>
                                    <input type="file" id="imageUpload" accept="image/*" style="display: none"
                                           name="image"><br/>
                                    <? if ($blogdet["image_pro"]) { ?><img
                                        src="../uploads/thumbs/<?php echo $blogdet["image_pro"] ?>" id="profile-img-tag"
                                        width="100px" />
                                    <? } else { ?>
                                        <img src="" id="profile-img-tag" width="100px"/>
                                    <? } ?>

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
                                    <input type="submit" class="btn btn-theme" value="Update Owner" name="blog_post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <a href="manage-owner.php?id=<?php echo $blogdet['indexer']; ?>">
                                        <button type="button" class="btn btn-theme"
                                                onClick="return confirm('Are you sure you want to delete breeder <?php echo $blogdet['group_name']; ?>');">
                                            Delete Owner
                                        </button>
                                    </a>

                                </li>

                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </section>
</section>


<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#froala-editor', {
      // Set the file upload URL.
      imageUploadURL: 'assets/img/page-edit/upload_image.php',

      imageUploadParams: {
        id: 'my_editor'
      }
    })
  </script>-->


<?php
include 'include/footer.php';
?>
</body>
</html>

