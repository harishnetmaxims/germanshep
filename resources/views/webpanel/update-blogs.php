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
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $tags = mysqli_real_escape_string($con, $_POST['tags']);
        $category_id = mysqli_real_escape_string($con, $_POST['category']);
        $allow_replies = mysqli_real_escape_string($con, $_POST['allow_replies']);
        $allow_rating = mysqli_real_escape_string($con, $_POST['allow_rating']);
        $private_pub = mysqli_real_escape_string($con, $_POST['private_pub']);
        $story = addslashes($_POST['story']);
        $uname = mysqli_real_escape_string($con, $_POST['user']);
        $approved = mysqli_real_escape_string($con, $_POST['approved']);
        $user_id = mysqli_real_escape_string($con, $_POST['uid']);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "../images/blog/$image");

        $bcat = "Select * from blog_categories where category_id = '$category'";
        $bcatresult = mysqli_query($con, $bcat);
        $bcatdetail = mysqli_fetch_assoc($bcatresult);
        $catname = $bcatdetail["category_name"];


        if ((!($_FILES['image']['name']))) /* If there Is No file Selected*/ {
            $que = "update dp_blogs set user_id='$user_id', blog_owner='$uname', title='$title', description='$description', tags='$tags', category='$catname', category_id='$category_id', allow_replies='$allow_replies', allow_ratings='$allow_rating', public_private='$private_pub', blog_story='$story', approved='$approved' where indexer = '$blog_id'";

        } else /* If file is  Selected*/ {
            $que = "update dp_blogs set user_id='$user_id', blog_owner='$uname', title='$title', description='$description', tags='$tags', category='$catname', category_id='$category_id', allow_replies='$allow_replies', allow_ratings='$allow_rating', public_private='$private_pub', blog_story='$story', blog_img='$image', approved='$approved' where indexer = '$blog_id'";

        }


//print_r($que);
//exit();
        $query = mysqli_query($con, $que);
        $_SESSION['msg'] = "Page Updated successfully";
        $extra = "manage-blog.php";
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
            <h3><i class="fa fa-angle-right"></i> Blog's Information</h3>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>

                        <?php
                        $sqlblog = "Select * from dp_blogs where indexer = '$blog_id'";
                        $resultblog = mysqli_query($con, $sqlblog);
                        $blogdet = mysqli_fetch_assoc($resultblog);
                        ?>
                        <form method="post" name="blog_form" id="blog_form" action="" enctype="multipart/form-data">

                            <ul>
                                <input type="hidden" name="user" value='<?php echo $blogdet["blog_owner"]; ?>'>
                                <input type="hidden" name="uid" value='<?php echo $blogdet["user_id"]; ?>'>
                                <li><strong>Title:</strong><br>
                                    <input class="input form-control" type="text" name="title"
                                           value="<?php echo $blogdet["title"]; ?>"></li>

                                <li><strong>Description:</strong><br>
                                    <input class="input form-control" type="text" name="description"
                                           value="<?php echo $blogdet["description"]; ?>"></li>

                                <li><strong>Tags:</strong><br>
                                    <input class="input form-control" type="text" name="tags"
                                           value="<?php echo $blogdet["tags"]; ?>">
                                    <div class="upload-video-tags">Enter tag words - more than 1 word, separated by
                                        spaces - (NO COMMAS).<br>
                                        Tags are keywords used to describe your media.
                                    </div>
                                </li>

                                <li><strong>Category:</strong><br>
                                    <select class="input form-control" name="category" value="">
                                        <?php
                                        $sqlcc = "Select * from blog_categories";
                                        $resultcc = mysqli_query($con, $sqlcc);
                                        if (mysqli_num_rows($resultcc) > 0) {
                                            while ($rowcat = mysqli_fetch_assoc($resultcc)) {
                                                ?>
                                                <option value="<?php echo $rowcat["category_id"] ?>" <?php if ($blogdet["category_id"] == $rowcat["category_id"]) { ?> selected="selected" <?php } ?>><?php echo $rowcat["category_name"] ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </li>

                                <li><strong>Allow replies:</strong><br>
                                    <select class="input form-control" name="allow_replies">
                                        <option value="no">No</option>
                                        <option value="yes" selected="selected">Yes</option>
                                    </select></li>

                                <li><strong>Allow ratings:</strong><br>
                                    <select class="input form-control" name="allow_rating">
                                        <option value="no">No</option>
                                        <option value="yes" selected="selected">Yes</option>
                                    </select></li>

                                <li><strong>Public / Private:</strong><br>
                                    <select class="input form-control" name="private_pub">
                                        <option value="private">Private</option>
                                        <option value="public" selected="selected">Public</option>
                                    </select></li>

                                <li><strong>Approval:</strong><br>
                                    <select class="input form-control" name="approved">
                                        <option value="yes">Yes</option>
                                        <option value="pendingdelete" selected="selected">Pendingdelete</option>
                                    </select></li>

                                <li><strong>Blog Story:</strong><br>
                                    <textarea class="form-control summernote" name="story"
                                              value=""><?php echo $blogdet["blog_story"] ?></textarea>
                                </li>


                                <li><strong>Blog Image:</strong><br>
                                    <input type="file" name="image" id="profile-img"
                                           value="<?php echo $blogdet["blog_img"] ?>" class="input form-control"/><br>
                                    <img src="../images/blog/<?php echo $blogdet["blog_img"] ?>" id="profile-img-tag"
                                         width="100px"/>

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
                                </br>


                                <li>
                                    <input type="submit" class="btn btn-theme" value="Update Blog" name="blog_post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <a href="manage-blog.php?id=<?php echo $blogdet['indexer']; ?>">
                                        <button type="button" class="btn btn-theme"
                                                onClick="return confirm('Are you sure you want to delete blog <?php echo $blogdet['title']; ?>');">
                                            Delete Blog
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

