<?php
session_start();
include 'include/dbconnection.php';
$uname = mysqli_real_escape_string($con, $_GET["uid"]);
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
        $approved = mysqli_real_escape_string($con, $_POST['approved']);
        $story = addslashes($_POST['story']);
        $uname = mysqli_real_escape_string($con, $_POST['user']);
        $u_id = mysqli_real_escape_string($con, $_POST['uid']);
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $uid = intval($_GET['uid']);
        move_uploaded_file($image_tmp, "../images/blog/$image");

        $bcat = "Select * from dp_blog_categories where category_id = '$category_id'";
        $bcatresult = mysqli_query($con, $bcat);
        $bcatdetail = mysqli_fetch_assoc($bcatresult);
        $catname = $bcatdetail["category_name"];
        $date_created = date('Y-m-d H:i:s');


        $que = "INSERT INTO dp_blogs (user_id, blog_owner, title, description, tags, category, category_id, allow_replies, allow_ratings, public_private, blog_story, blog_img, approved,date_created) VALUES ('$u_id','$uname','$title','$description','$tags','$catname','$category_id','$allow_replies','$allow_rating','$private_pub','$story','$image','$approved','$date_created')";
//print_r($que);
//exit();
        $query = mysqli_query($con, $que);
        $_SESSION['msg'] = "Page Updated successfully";
        $extra = "manage-blog.php";
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


                            <form method="post" name="blog_form" id="blog_form" action="" enctype="multipart/form-data">

                                <ul>
                                    <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>
                                    <input type="hidden" name="uid" value='<?php echo $_SESSION['id']; ?>'>
                                    <li><strong>Title:</strong><br>
                                        <input class="input form-control" type="text" name="title" value=""></li>

                                    <li><strong>Description:</strong><br>
                                        <input class="input form-control" type="text" name="description" value=""></li>

                                    <li><strong>Tags:</strong><br>
                                        <input class="input form-control" type="text" name="tags" value="">
                                        <div class="upload-video-tags">Enter tag words - more than 1 word, separated by
                                            spaces - (NO COMMAS).<br>
                                            Tags are keywords used to describe your media.
                                        </div>
                                    </li>

                                    <li><strong>Category:</strong><br>
                                        <select class="input form-control" name="category" value="">
                                            <?php
                                            $sqlcc = "Select * from blog_categories ORDER BY category_name ASC";
                                            $resultcc = mysqli_query($con, $sqlcc);
                                            if (mysqli_num_rows($resultcc) > 0) {
                                                while ($rowcat = mysqli_fetch_assoc($resultcc)) {
                                                    ?>
                                                    <option value="<?php echo $rowcat["category_id"] ?>"><?php echo $rowcat["category_name"] ?></option>
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
                                            <option value="yes" selected="selected">Yes</option>
                                            <option value="pendingdelete">Pendingdelete</option>
                                        </select></li>

                                    <li><strong>Blog Story:</strong><br>
                                        <textarea class="form-control summernote" name="story" value=""></textarea>
                                    </li>


                                    <li><strong>Blog Image:</strong><br>
                                        <input type="file" name="image" id="profile-img" class="input form-control"><br>
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

                                          $("#profile-img").change(function () {
                                            readURL(this);
                                          });
                                        </script>
                                    </li>


                                    <li>
                                        <input type="submit" class="button-form" value="Submit Article"
                                               name="blog_post">

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
