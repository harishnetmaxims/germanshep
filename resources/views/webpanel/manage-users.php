<?php
session_start();
include('include/dbconnection.php');
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else{

// for deleting user
if (isset($_GET['id'])) {
    $adminid = mysqli_real_escape_string($con, $_GET['id']);
    $sDelSQL = "delete from member_profile where user_id='$adminid'";
    $msg = mysqli_query($con, $sDelSQL);
    if ($msg) {
        echo "<script>alert('User deleted');</script>";
        $extra = "manage-users.php";
        echo "<script>window.location.href='" . $extra . "'</script>";
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

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</head>

<body>

<section id="container">
    <?php
    include 'include/header.php';
    include 'include/side.php';
    ?>
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Manage Users</h3>
            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>
                        <table class="table table-striped table-advance table-hover">
                            <div class="col-md-12" style="padding:0px;">
                                <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> All User Details </h4></div>
                                <div class="col-md-6">
                                    <div class="openinput">
                                        <input type="text" class="form-control" id="search" placeholder="Search Here..."
                                               name="search" value="">

                                    </div>
                                </div>


                                <div class="container d-xs-none">
                                    <div id="display"></div>
                                </div>
                                <hr>
                                <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th class="hidden-phone">First Name</th>
                                    <th> Last Name</th>
                                    <th> Username</th>
                                    <th> Account Type</th>
                                    <th>Country</th>
                                    <th>Reg. Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($_GET['pageno'])) {
                                    $pageno = mysqli_real_escape_string($con, $_GET['pageno']);
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 10;
                                $offset = ($pageno - 1) * $no_of_records_per_page;

                                $total_pages_sql = "SELECT COUNT(*) FROM member_profile";
                                $result = mysqli_query($con, $total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                $ret = mysqli_query($con, "select * from member_profile  ORDER BY  user_id DESC LIMIT $offset, $no_of_records_per_page");
                                $i = $offset;
                                while ($row = mysqli_fetch_array($ret)) { ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $row['first_name']; ?></td>
                                        <td><?php echo $row['last_name']; ?></td>
                                        <td><?php echo $row['user_name']; ?></td>
                                        <td><?php echo ucwords($row['account_type']); ?></td>
                                        <td><?php echo $row['country']; ?></td>
                                        <td><?php echo date('m/d/Y : H:i:s', strtotime($row['date_created'])); ?></td>
                                        <td>

                                            <a href="update-profile.php?uid=<?php echo $row['user_id']; ?>">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="manage-users.php?id=<?php echo $row['user_id']; ?>">
                                                <button class="btn btn-danger btn-xs"
                                                        onClick="return confirm('Are you sure you want to delete user <?php echo $row['user_name']; ?>');">
                                                    <i class="fa fa-trash-o "></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $cnt = $cnt + 1;
                                } ?>

                                </tbody>
                        </table>
                    </div>
                    <ul class="pagination">
                        <li><a href="?pageno=1">First</a></li>
                        <li class="<?php if ($pageno <= 1) {
                            echo 'disabled';
                        } ?>">
                            <a href="<?php if ($pageno <= 1) {
                                echo '#';
                            } else {
                                echo "?pageno=" . ($pageno - 1);
                            } ?>">Prev</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                            echo 'disabled';
                        } ?>">
                            <a href="<?php if ($pageno >= $total_pages) {
                                echo '#';
                            } else {
                                echo "?pageno=" . ($pageno + 1);
                            } ?>">Next</a>
                        </li>
                        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                    </ul>
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
