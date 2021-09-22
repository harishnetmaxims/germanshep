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

        $date_created = date('Y-m-d H:i:s');
        $added_by = mysqli_real_escape_string($con, $_POST['user']);


        $que = "INSERT INTO dp_registry (title, added_by,added_date) VALUES ('$title','$added_by','$date_created')";
        //print_r($que);
        //exit();
        $query = mysqli_query($con, $que);
        $_SESSION['msg'] = "Page Updated successfully";
        $extra = "manage-registry.php";
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

        <title>Admin | Add Registry</title>
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
                <h3><i class="fa fa-angle-right"></i> Title's Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>


                            <form method="post" name="blog_form" id="blog_form" action="" enctype="multipart/form-data">

                                <ul>
                                    <input type="hidden" name="user" value='<?php echo $_SESSION['login']; ?>'>

                                    <li><strong>Title:</strong><br>
                                        <input class="input form-control" type="text" name="title" value=""></li>


                                    <li>
                                        <input type="submit" class="button-form" value="Submit Registry"
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
