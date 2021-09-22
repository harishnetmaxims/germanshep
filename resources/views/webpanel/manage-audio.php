<?php
session_start();
include 'include/dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else{

// for deleting pages
if (isset($_GET['id'])) {
    $pageid = mysqli_real_escape_string($con, $_GET['id']);
    $msg = mysqli_query($con, "delete from dp_audios where audio_id='$pageid'");
    if ($msg) {
        echo "<script>alert('Data deleted');</script>";
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Audio</title>
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
            <h3><i class="fa fa-angle-right"></i> Manage Audio</h3>
            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> All Audio </h4>
                            <hr>
                            <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Audio Title</th>
                                <th> Album</th>
                                <th> Approved</th>
                                <th>Upload Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $ret = mysqli_query($con, "select * from dp_audios");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo substr($row['album'], 0, 500); ?></td>
                                    <td><?php echo $row['approved']; ?></td>
                                    <td><?php echo $row['date_uploaded']; ?></td>
                                    <td>

                                        <a href="update-blogs.php?uid=<?php echo $row['audio_id']; ?>">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <a href="manage-blogs.php?id=<?php echo $row['audio_id']; ?>">
                                            <button class="btn btn-danger btn-xs"
                                                    onClick="return confirm('Do you really want to delete');"><i
                                                        class="fa fa-trash-o "></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php $cnt = $cnt + 1;
                            } ?>

                            </tbody>
                        </table>
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
