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
        $channel_id = mysqli_real_escape_string($con, $_POST['uid']);

        $que = "update dp_registry set title='$title' where id = '$channel_id'";


//print_r($que);
//exit();
        $query = mysqli_query($con, $que);
        $_SESSION['msg'] = "Page Updated successfully";
        $extra = "manage-registry.php";
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

    <title>Admin | Update Registry</title>
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

    $sqlblog = "Select * from dp_registry where id = '$blog_id'";
    $resultblog = mysqli_query($con, $sqlblog);
    $blogdet = mysqli_fetch_assoc($resultblog);
    ?>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> <?php echo $blogdet['title']; ?>'s Information</h3>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>

                        <form method="post" name="blog_form" id="blog_form" action="" enctype="multipart/form-data">

                            <ul>
                                <input type="hidden" name="uid" value='<?php echo $blogdet["id"]; ?>'>
                                <li><strong>Title:</strong><br>
                                    <input class="input form-control" type="text" name="title"
                                           value="<?php echo $blogdet["title"]; ?>"></li>


                                <li>
                                    <input type="submit" class="btn btn-theme" value="Submit Registry" name="blog_post">

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

